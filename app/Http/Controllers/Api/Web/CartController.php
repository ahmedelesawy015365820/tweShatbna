<?php

namespace App\Http\Controllers\Api\Web;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    //delete from cart
    public function delete(Request $request)
    {
        $product=Product::find($request->product_id);
        $user=$request->user()->client()->first();
        if ($user && $user->cart()->find($product->id) && $product) {
            $product->cart()->detach($user);
            return response()->json(['message' => __('text.Removed successfully from your cart'),'cart' => CartResource::collection($user->cart()->whereDate('expiry_date','>=',now()->format('Y-m-d\TH:m:s'))->where('stock','>',0)->get())],201);
        }
    }

    //update cart
    public function updateCart(Request $request)
    {
        $product=Product::whereDate('expiry_date','>=',now()->format('Y-m-d\TH:m:s'))->where('stock','>',0)->find($request->product_id);
        $user=$request->user()->client()->first();
        $qty=$request->qty <= 0 ?   1 : $request->qty;
        if($qty > 0 && $product && $qty <= $product->stock ){
            $product->cart()->updateExistingPivot($user->id , ['qty' =>  $qty]);
        }
        return response()->json(['cart' => CartResource::collection($user->cart()->whereDate('expiry_date','>=',now()->format('Y-m-d\TH:m:s'))->where('stock','>',0)->get())]);
    }

    //add to cart
    public function addToCart(Request $request)
    {
        $product=Product::where('isActive',1)->whereDate('expiry_date','>=',now()->format('Y-m-d\TH:m:s'))->where('stock','>',0)->where('id',$request->product_id)->first();
        $user=$request->user()->client()->first();
        $qty=$request->qty <= 0 ? 1 : $request->qty;
        if (!$user->cart()->find($product->id)) {
            $user->cart()->syncWithoutDetaching([$product->id => ['qty' => $qty]]);
            return response()->json(['qty'=>$qty,'message' => 'Added successfully to your cart'],200);

        } else {
            return response()->json(['message' => 'The product already in your cart'],201);
        }
    }


    //return cart
    public function getCart(Request $request)
    {
        $user = $request->user()->client()->first();
        return response()->json(['cart' => CartResource::collection($user->cart()->whereDate('expiry_date','>=',now()->format('Y-m-d\TH:m:s'))->where('stock','>',0)->get())]);
    }


}
