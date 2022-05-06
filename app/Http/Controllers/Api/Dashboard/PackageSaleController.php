<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AdvertisingPackage;
use App\Models\Media;
use App\Models\PackageSale;
use App\Models\User;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PackageSaleController extends Controller
{

    use Message;

    public function index(Request $request)
    {
        $package = PackageSale::with('package:id','user:name')->when($request->search,function ($q) use($request){
            return $q->whereRelation('user','name','like','%'.$request->search.'%');
        })->latest()->paginate(10);

        return $this->sendResponse(['packageSale' => $package],'Data exited successfully');

    }

    public function create()
    {
        try {

            $packages = AdvertisingPackage::whereStatus(true)->get();

            return $this->sendResponse(['packages' => $packages],'Data exited successfully');

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }

    }

    public function store(Request $request)
    {

        try{
            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(),[
                'package' => 'required|integer|exists:advertising_packages,id',
                'user' => 'required|integer|exists:users,id',
                'files' => 'required',
                'files.*' => 'file|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=100,min_height=100,max_width=500,max_height=500',
            ]);

            if($v->fails()) {
                return $this->sendError('There is an error in the data',$v->errors(),401);
            }

            $checkAdvertise = User::find($request->user)->role_name;


        if(in_array('advertiser',$checkAdvertise)){

                $sale = PackageSale::create(['advertising_package_id' => $request->package,'check' => $request->check]);

                $sale->user()->attach($request->user);

                $i = 0;
                if($request->hasFile('files')){
                    foreach($request->file('files') as $index => $file){

                        $file_size = $file->getSize();
                        $file_type = $file->getMimeType();
                        $image = time().$i.'.'. $file->getClientOriginalName();

                        // picture move
                        $file->storeAs($sale->id, $image,'advertise');

                        $sale->media()->create([
                            'file_name' => $image ,
                            'file_size' => $file_size,
                            'file_type' => $file_type,
                            'file_sort' => $i
                        ]);

                        $i++;
                    }
                }

            }else{
                return $this->sendError('There is no advertiser for this id',['error' => 'id'],401);
            }

            DB::commit();
            return $this->sendResponse([],'Data exited successfully');

        }catch(\Exception $e){
            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    }

    public function show($id)
    {
        try {

            $package = PackageSale::with(['package','user.complement','media'])->find($id);

            if($package){

                return $this->sendResponse(['packageSale' => $package],'Data exited successfully');
            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }

    }

    public function edit($id)
    {
        try {

            $packages = AdvertisingPackage::whereStatus(true)->get();

            $packageId = PackageSale::with('media:id,mediable_id,file_name')->find($id);

            return $this->sendResponse(['package' => $packageId,'packages' => $packages],'Data exited successfully');

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }
    }

    public function update(Request $request,$id)
    {
        try{

            $packageSale = PackageSale::find($id);

            if($packageSale){

                // Validator request
                $v = Validator::make($request->all(),[
                    'package' => 'required|integer|exists:advertising_packages,id',
                    'files' => 'nullable',
                    'files.*' => 'nullable|file|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=100,min_height=100,max_width=500,max_height=500',
                ]);

                if($v->fails()) {
                    return $this->sendError('There is an error in the data',$v->errors(),401);
                }

                $packageSale->update(['advertising_package_id' => $request->package]);

                $i = 0;
                if($request->hasFile('files')){
                    foreach($request->file('files') as $index => $file){

                        $file_size = $file->getSize();
                        $file_type = $file->getMimeType();
                        $image = time().$i.'.'. $file->getClientOriginalName();

                        // picture move
                        $file->storeAs($packageSale->id, $image,'advertise');

                        $packageSale->media()->create([
                            'file_name' => $image ,
                            'file_size' => $file_size,
                            'file_type' => $file_type,
                            'file_sort' => $i
                        ]);

                        $i++;
                    }
                }

                return $this->sendResponse([],'Data exited successfully');

            }else{
                return $this->sendError('ID is not exist');
            }

        }catch(\Exception $e){
            return $this->sendError('An error occurred in the system');
        }

    }

    public function check(Request $request)
    {
        try{

            $packageSale = PackageSale::find($request->id);

            if($packageSale){

                // Validator request
                $v = Validator::make($request->all(), ['check' => 'required|boolean']);

                if($v->fails()) {
                    return $this->sendError('There is an error in the data',$v->errors());
                }

                $packageSale->update(['check' => $request->check]);

            }else{
                return $this->sendError('ID is not exist');
            }

        }catch(\Exception $e){
            return $this->sendError('An error occurred in the system');
        }

    }

    public function accept(Request $request)
    {
        try{

            $packageSale = PackageSale::find($request->id);

            if($packageSale){

                // Validator request
                $v = Validator::make($request->all(), ['accept' => 'required|boolean']);

                if($v->fails()) {
                    return $this->sendError('There is an error in the data',$v->errors());
                }

                $packageSale->update(['accept' => $request->accept]);




            }else{
                return $this->sendError('ID is not exist');
            }

        }catch(\Exception $e){
            return $this->sendError('An error occurred in the system');
        }

    }

    public function complete(Request $request)
    {
        try{

            $packageSale = PackageSale::find($request->id);

            if($packageSale){

                // Validator request
                $v = Validator::make($request->all(), ['complete' => 'required|boolean']);

                if($v->fails()) {
                    return $this->sendError('There is an error in the data',$v->errors());
                }

                $packageSale->update(['complete' => $request->complete,]);

            }else{
                return $this->sendError('ID is not exist');
            }

        }catch(\Exception $e){
            return $this->sendError('An error occurred in the system');
        }

    }

    public function deleteOne(Request $request,$id)
    {
        try {
            $package = PackageSale::find($id);
            if ($package){

                $media = Media::find($request->idMedia);

                if(File::exists('web/img/advertise/'.$id.'/'.$media->file_name)){
                    unlink('web/img/advertise/'.$id.'/'. $media->file_name);
                }

                $media->delete();
                return $this->sendResponse([],'Deleted successfully');
            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }
    }

    public function destroy($id)
    {
        try {
            $package = PackageSale::find($id);
            if ($package){

                $package->delete();
                return $this->sendResponse([],'Deleted successfully');
            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }
    }

}
