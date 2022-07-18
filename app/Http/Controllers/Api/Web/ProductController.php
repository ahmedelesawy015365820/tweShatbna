<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Message;


    public function index(Request $request)
    {
        $products = Product::whereDate('expiry_date','>=',now()->format('Y-m-d\TH:m:s'))->where('stock','>',0)->
        where(function($q) use($request){
            $q->when($request->search,function($q) use($request){
                $q->whereRelation('translations',function($q) use($request){
                    $q->where('name','like','%'.$request->search.'%')
                    ->orWhere('description','like','%'.$request->search.'%')
                    ->orWhere('divo','like','%'.$request->search.'%');

                })
                ->orWhere('weight','like','%'.$request->search.'%')
                ->orWhere('price','like','%'.$request->search.'%')
                ->orWhere('sale','like','%'.$request->search.'%');
            });
        })
        ->where(function($q) use($request){
            $q->when($request->date,function($q) use($request){
                $q->whereDate('expiry_date',$request->date);
            });
        })
        ->where(function($q) use($request){
            $q->when($request->category,function($q) use($request){
                $q->where('category_id',$request->category);
            });
        })
        ->latest()->paginate(8);
        return $this->sendResponse(['products' => $products],'Data exited successfully');
    }

    // latest 6 products for section products in index page
    public function latestProducts()
    {
        $products=Product::whereDate('expiry_date','>=',now()->format('Y-m-d\TH:m:s'))->where('stock','>',0)->latest()->limit(4)->get();
        return response()->json(['products' => $products]);
    }


    public function show($id)
    {
        $product = Product::with('images')->whereDate('expiry_date','>=',now()->format('Y-m-d\TH:m:s'))->where('stock','>',0)->findOrFail($id);
        // $product['ex_date'] = Carbon::parse($product->expiry_date)->format('');
        return $this->sendResponse(['product' => $product],'Data exited successfully');
    }



}
