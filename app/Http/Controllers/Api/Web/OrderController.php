<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderItemsResource;
use App\Models\Area;
use App\Models\AreaCost;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\WeightCost;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{

    //create order
    public function createOrder(Request $request)
    {
        // $paypal= new PayPalPaymentController();
        // return $paypal->handlePayment();

        if($request->payment_method == "paymob accept"){
            return response()->json(['message' => __('text.Not Available Now')],404);
        }

        // $admin = User::first();//admin

        $this->validate($request, $this->rulesValidation());
        $user = $request->user()->client()->first();
        $cart=$user->cart()->whereDate('expiry_date','>=',now()->format('Y-m-d\TH:m:s'))->where('stock','>',0)->get();

        if(!$this->checkStock($cart)){
            return response()->json(['message' => 'Unknown error','cart' => CartResource::collection($cart)],400);
        }
        $data = collect($request->only(['address','receiver_phone','receiver_first_name','receiver_last_name','payment_method','area_id','country_id','state_id']))->toArray();
        $data['total_amount'] =0;

        $order = Order::create($data);

        //associate order with user
        $user->orders()->save($order);


        //assoicate order with products
        $this->associateOrderWithProducts($cart,$order,$request->area_id);

        if($order->payment_method == 'cash on delivery'){
            //delete cart
            $user->cart()->detach();
            // $admin->notify(new OrderNotification($order->id,$user->id));
        }


        return response()->json(['message' => 'Order Created Successfully'], 200);
    }

    //validation
    protected function rulesValidation()
    {
        return [
            'address' => 'required|string',
            'receiver_phone' => 'required|numeric',
            'receiver_first_name' => 'required|string',
            'receiver_last_name' => 'required|string',
            'payment_method' => ['required',Rule::in(['cash on delivery','paypal','paymob accept'])],
            'area_id' => 'required|exists:areas,id',
            'state_id' => 'required|exists:states,id',
            'country_id' => 'required|exists:countries,id',
        ];
    }


    //associate order with products
    protected function associateOrderWithProducts($cart,$order,$area_id)
    {
        $sub_total = 0;
        $total_wight = 0;
        foreach ($cart as $item) {
            if ($item && $item->isActive == 1) {
                $price = $item->sale > 0 ? $item->sale : $item->price;
                $order->products()->syncWithoutDetaching([$item->id => [
                    'quantity' => $item->pivot->qty,
                    'price' => $price,
                    'weight' => $item->weight * $item->pivot->qty,
                    'sub_total' => $item->pivot->qty * $price,
                ]]);
                $total_wight += $item->weight * $item->pivot->qty;
                $sub_total += $item->pivot->qty * $price;
            }
        }

        $area_cost =$area_id?$this->get_area_cost($area_id) : 0;
        $weight_cost =$this->get_weight_cost($total_wight);
        $order->update(['subtotal' => $sub_total,'shipping_cost'=>$area_cost,'weight' => $weight_cost , 'total_amount' => $sub_total+$area_cost+$weight_cost]);
    }


    public function getOrders(Request $request)
    {
        $user = $request->user()->client()->first();
        return response()->json(['orders' => $user->orders]);
    }


    public function getOrderDetails(Request $request, Order $order)
    {
        if ($order->client_id == $request->user()->client()->first()->id) {
            return response()->json(['order' => Order::with(['area.translation:name','state.translation:name','country.translation:name'])->find($order->id),'products' => $order->products()->withTrashed()->get()], 200);
        }
    }


    //total amount for shipment api and payment method
    public function getTotalAmount($cart)
    {
        $sub_total = 0;
        $total_wight = 0;
        foreach ($cart as $item) {
            if ($item && $item->isActive == 1) {
                $price = $item->sale > 0 ? $item->sale : $item->price;
                $sub_total += $item->pivot->qty * $price;
                $total_wight += $item->weight * $item->pivot->qty;
            }
        }

        return ['sub_total'=>$sub_total,'total_weight'=>$total_wight];
    }

    public function getTotalWithShoppingCost(Request $request)
    {
        $user = $request->user()->client()->first();
        $cart = $user->cart()->whereDate('expiry_date','>=',now()->format('Y-m-d\TH:m:s'))->where('stock','>',0)->get();
        $arr = $this->getTotalAmount($cart);
        $area_cost = $request->area_id?$this->get_area_cost($request->area_id) : 0;
        $weight_cost = $this->get_weight_cost($arr['total_weight']);
        return response()->json(['cart' => CartResource::collection($cart),'sub_total'=>$arr['sub_total'],'weight_cost' =>$weight_cost ,'area_cost' => $area_cost,'total_amount' => $arr['sub_total']+$area_cost+$weight_cost]);
    }


    //get weight cost
    protected function get_weight_cost($weight)
    {

        $weightCost = WeightCost::where('from','<=',$weight)->where('to' , '>=',$weight)->first();
        if(!$weightCost){
            $weightCost = WeightCost::where('to','<',$weight)->orderBy('to', 'desc')->first();
            if(!$weightCost){
                $weightCost = WeightCost::where('from','>',$weight)->orderBy('from')->first();
                if(!$weightCost || $weight == 0){
                    return 0;
                }else{
                    return $weightCost->cost;
                }
            }else{
                return $weightCost->cost;
            }
        }else{
            return $weightCost->cost;
        }

    }


    //get area cost
    protected function get_area_cost($area_id)
    {
        $area=AreaCost::where('area_id',$area_id)->first();
        return $area->cost;
    }


    // check stock
    public function checkStock($cart)
    {
        foreach ($cart as $item) {
            if (!$item && $item->isActive != 1 && $item->stock <= 0) {
                return false;
            }
        }
        return true;
    }




    //payment accept
    // public function acceptPayment($order)
    // {
    //     if($order->payment_method ==  'paymob accept'){
    //         $pay= new PaymobAcceptController();
    //         $response=$pay->generateInvoiceUrl($this->paymentData($order),$order);
    //         return response()->json(['url' => $response['url']],200);
    //     }
    // }


    // protected function paymentData($order)
    // {
    //     return [
    //         'first_name' => $order->receiver_first_name,
    //         'last_name' => $order->receiver_last_name,
    //         'phone' => $order->receiver_phone,
    //         'email' => $order->customer->email,
    //         'total_amount' => $order->total_amount,
    //     ];
    // }
}
