<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Loata\ProductRequest;
use App\Models\CompanyPhases;
use App\Models\Images;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use App\Traits\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    use Message;



    //get all orders
    public function index(Request $request)
    {
        $orders = $this->search($request);
        return $this->sendResponse(['orders' => $orders],'Data exited successfully');
    }



    // order details
    public function show($id)
    {
        $order = Order::with(['area','state','country'])->findOrFail($id);
        $products = $order->products()->withTrashed()->get();
        $client = $order->customer()->first();
        $order_numbers = $client->orders()->count();
        $user = User::find($client->user_id);
        $client_orders=$client->orders()->count();
        $refund_allowed_days=Setting::find(1)->refund_allowed_days;
        $refund_allowed = $order->updated_at->addDays($refund_allowed_days) > now();
        $refund_date = $order->updated_at->addDays($refund_allowed_days)->format('Y-m-d / (H:i)');
        return $this->sendResponse(['order' => $order,'products'=>$products,'refund_date' => $refund_date,'refund_allowed'=>$refund_allowed,'order_numbers' => $order_numbers,'client' => $user,'client_orders' => $client_orders],'Data exited successfully');
    }




    // search
    protected function search($request)
    {
        return Order::
        where(function ($q) use($request) {
            return $q
            ->when($request->payment_status, function ($q) use($request) {
                return $q->where('payment_status', $request->payment_status);
            });
        })
        ->where(function ($q) use($request) {
            return $q
            ->when($request->payment_method, function ($q) use($request) {
                    return $q->where('payment_method', $request->payment_method);
            });
        })
        ->where(function ($q) use($request) {
            return $q
            ->when($request->order_status, function ($q) use($request) {
                if ($request->order_status == 'hold') {
                    return $q->where('hold', 1);
                } else {
                    return $q->where('order_status', $request->order_status);
                }
            });
        })
        ->where(function ($q) use($request) {
            $q->when(is_numeric($request->search), function ($q) use($request) {
                return $q->where('id', $request->search)
                        ->orWhere('total_amount', 'like', '%' . $request->search . '%');
            })->when(!is_numeric($request->search), function ($q) use($request) {
                return $q->where('address', 'like', '%' . $request->search . '%')
                    ->orWhere('receiver_first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('receiver_last_name', 'like', '%' . $request->search . '%');
            });
        })
        ->orderByDesc('id')->latest()->paginate(10);
    }



    public function updateOrderStatus(Request $request)
    {
        $order=Order::findOrFail($request->id);
        if($order->hold == 1 ){
            $order->update(['hold' => 0]);
        }
        if ($order && $order->payment_status != 'failed' && ($order->order_status != 'completed' && $order->order_status != 'canceled' && $order->order_status != 'modified' && $order->order_status != 'refund')) {
            if ($order->order_status == 'pending') {
                $order->update(['order_status' => 'processing']);
            } elseif ($order->order_status == 'processing') {
                $order->update(['order_status' => 'shipping']);
            } elseif ($order->order_status == 'shipping') {
                $order->update(['order_status' => 'completed']);
                if ($order->payment_method == 'cash on delivery') {
                    $order->update(['payment_status' => 'paid']);
                }
                // foreach ($order->vendors()->withTrashed()->get() as $vendor) {
                //     Mail::to($vendor->email)->send(new AfterOrderComplete(__('text.Your order') . $order->id . __('text.get completed'),$vendor->store_name));
                // }
            }
            $order->save();
            return response()->json(['message' => 'Order Updated Successfully'],200);
        }
    }


    public function holdOrder(Request $request){

        $order=Order::findOrFail($request->id);

        if ($order && $order->payment_status != 'failed' && ($order->order_status != 'completed' && $order->order_status != 'pending' && $order->order_status != 'canceled' && $order->order_status != 'modified'&& $order->order_status != 'refund')) {
            if($order->hold == 0){
                $order->update(['hold' => 1]);
                return response()->json(['message' => 'Order is pending'],200);
            }else{
                $order->update(['hold' => 0]);
                return response()->json(['message' => 'Order Updated Successfully'],200);
            }

        }
    }

    public function cancelOrder(Request $request){
        $order=Order::findOrFail($request->id);
        $refund_allowed_days=Setting::find(1)->refund_allowed_days;

        if ($order && $order->payment_status != 'failed' && ($order->payment_method == 'cash on delivery' || ($order->payment_method == 'online payment' && $order->payment_status == 'paid'))) {
            if(($order->order_status == 'processing' ||$order->order_status == 'pending') && $order->payment_method == 'cash on delivery'){
                $this->returnProductToStock($order);
                $order->update(['payment_status' => 'failed', 'order_status' => 'canceled']);
                return response()->json(['message' => 'Order Canceled Successfully'],200);

            }

            elseif(($order->payment_method == 'online payment' && $order->payment_status == 'paid') || ( $order->order_status == 'shipping' || ($order->order_status == 'completed' && $order->updated_at->addDays($refund_allowed_days) > now()))){
                $this->refundOrder($order);
                return response()->json(['message' => 'Order Updated Successfully'],200);
            }

        }
    }



     //cancel order
    public function returnProductToStock($order){
        foreach($order->products()->withTrashed()->get() as $product){
            $product->update(['stock' => $product->stock+$product->pivot->quantity]);
        }
    }




    protected function refundOrder($order)
    {

        foreach ($order->products()->withTrashed()->get() as $product) {
            $quantity = $product->pivot->quantity;
            $product->update(['stock' => $product->stock + $quantity]);
        }
        $order->update(['payment_status' => 'failed', 'order_status' => 'refund']);
        session()->flash('danger', __('text.Order Refunded Successfully'));
    }

    // protected function modify_after_collected($order, $sizes)
    // {
    //     $sum_taxes = 0;
    //     $sum_total_amount = 0;
    //     $sum_subtotal = 0;
    //     foreach (collect($sizes)->toArray() as $size_id) {
    //         $size = Size::withTrashed()->find($size_id);
    //         if ($size) {
    //             $order_size=$order->sizes->where('id', $size->id);
    //             $quantity = $order_size->pluck('pivot.quantity')->first();
    //             $price = $order_size->pluck('pivot.price')->first();
    //             $taxes = $order_size->pluck('pivot.tax')->first();
    //             $total_refund_amount = ($quantity * $price) + $taxes;
    //             $vendor_id = $size->color()->withTrashed()->first()->product()->withTrashed()->first()->user_id;
    //             $subtotal_refund = $quantity * $price;
    //             Refund::create([
    //                 'order_id' => $order->id,
    //                 'vendor_id' => $vendor_id,
    //                 'total_refund_amount' => $total_refund_amount,
    //                 'size_id' => $size->id,
    //                 'quantity' => $quantity,
    //                 'price' => $price,
    //                 'taxes' => $taxes,
    //                 'size' => $order_size->pluck('pivot.size')->first(),
    //                 'color' => $order->colors->where('id', $size->color()->withTrashed()->first()->id)->pluck('pivot.color')->first(),
    //                 'subtotal_refund_amount' => $subtotal_refund,
    //             ]);
    //             $size->update(['stock' => $size->stock + $quantity]);

    //             $order->vendors()->updateExistingPivot($vendor_id, [
    //                 'total_amount' => $order->vendors->find($vendor_id)->pivot->total_amount - $total_refund_amount,
    //                 'subtotal' => $order->vendors->find($vendor_id)->pivot->subtotal - $subtotal_refund,
    //                 'taxes' => $order->vendors->find($vendor_id)->pivot->taxes - $taxes,
    //             ]);

    //             $sum_taxes += $taxes;
    //             $sum_total_amount += $total_refund_amount;
    //             $sum_subtotal += $subtotal_refund;
    //             $vendor=User::find($vendor_id);
    //             Mail::to($vendor->email)->send(new AfterOrderComplete(__('text.Your order') . $order->id . __('text.get modified'),$vendor->store_name));

    //         }
    //     }

    //     $order->update(['taxes' => $order->taxes - $sum_taxes, 'subtotal' => $order->subtotal - $sum_subtotal, 'total_amount' => $order->total_amount - $sum_total_amount, 'payment_status' => 'paid', 'order_status' => 'modified']);
    // }



}
