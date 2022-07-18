<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Loata\ProductRequest;
use App\Models\CompanyPhases;
use App\Models\Images;
use App\Models\Product;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    use Message;


    public function index(Request $request)
    {
        $products = Product::
        where(function($q) use($request){
            $q->when($request->search,function($q) use($request){
                $q->whereRelation('translations',function($q) use($request){
                    $q->where('name','like','%'.$request->search.'%')
                    ->orWhere('description','like','%'.$request->search.'%')
                    ->orWhere('divo','like','%'.$request->search.'%');

                })
                ->orWhere('price','like','%'.$request->search.'%')
                ->orWhere('stock','like','%'.$request->search.'%')
                ->orWhere('weight','like','%'.$request->search.'%')
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
        ->latest()->paginate(9);
        return $this->sendResponse(['products' => $products],'Data exited successfully');
    }


    public function store(ProductRequest $request)
    {
        // picture move
        $image = time().'.'. $request->image->getClientOriginalName();
        $request->image->storeAs('general', $image,'general');
        $data=collect($request->all())->only(['price','sale','weight','stock','expiry_date','ar','en','category_id'])->filter()->toArray();
        $data['image']=$image;
        $product=Product::create($data);
        $this->storeImages($product,$request->file('groupImages'));
        return $this->sendResponse([],'Data exited successfully');

    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $this->sendResponse(['product' => $product],'Data exited successfully');
    }


    public function update(ProductRequest $request, $id)
    {

        $data=collect($request->all())->only(['price','sale','weight','stock','expiry_date','ar','en','category_id'])->filter()->toArray();
        $product = Product::findOrFail($request->id);

        if($request->image){
            unlink(public_path('web/img/general/'.$product->getAttributes()['image']));
            // picture move
            $image = time().'.'. $request->image->getClientOriginalName();
            $request->image->storeAs('general', $image,'general');
            $data['image']=$image;
        }

        if($request->groupImages){
            //delete image from folder
            $this->unlinkGroupOfImage($product->images);

            //delete images from database
            $product->images()->delete();

            // store new images and associate it with the product
            $this->storeImages($product,$request->file('groupImages'));
        }

        $product->update($data);
        $product->save();
        return $this->sendResponse([],'Data exited successfully');
    }

    public function destroy($id)
    {

        $product = Product::findOrFail($id);

        //if the product has no orders   then delete images from folder and database
        // if(public_path('web/img/general/'.$product->getAttributes()['image']))
        // unlink(public_path('web/img/general/'.$product->getAttributes()['image']));
        // $this->unlinkGroupOfImage($product->images);
        // $product->images()->delete();
        $product->delete();
        return $this->sendResponse([],'Deleted successfully');
    }


    //store images and associate it with product
    protected function storeImages($product,$groupImages)
    {
        if ($groupImages){
            foreach ($groupImages as $file){
                $fileName=time().'_'.$file->getClientOriginalName();
                $file->move(public_path('web/img/general/'),$fileName);
                $product->images()->create(['name' => $fileName]);
            }

        }
    }

    protected function unlinkGroupOfImage($images){
        foreach ($images as $image){
            if(File::exists(public_path('web/img/general/'.$image->getAttributes()['name'])))
                unlink(public_path('web/img/general/'.$image->getAttributes()['name']));
        }
    }
}
