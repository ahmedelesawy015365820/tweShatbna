<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisePackageRequest;
use App\Http\Resources\AdvertisingPackageResource;
use App\Models\AdvertisingPackage;
use App\Models\AdvertisingPage;
use App\Models\AdvertisingPageMobile;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PackageController extends Controller
{

    use Message;

    public function index(Request $request)
    {
        $package = AdvertisingPackage::when($request->search,function ($q) use($request){
            return $q->whereRelation('translations','name','like','%'.$request->search.'%');
        })->paginate(5);

        return $this->sendResponse(['package' => $package],'Data exited successfully');

    }


    public function create()
    {
        try {

            $pageView = AdvertisingPage::with('views')->get();

            $pageViewMobile = AdvertisingPageMobile::with('views')->get();

            return $this->sendResponse(['pageView' => $pageView, 'pageViewMobile' => $pageViewMobile],'Data exited successfully');

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }

    }


    public function store(AdvertisePackageRequest $request)
    {
        DB::beginTransaction();
        try{

            $data = $request->only(['ar','en','period','visiter_num','price']);

            $package = AdvertisingPackage::create($data);

            $package->page_view()->attach($request->pageView_id);

            $package->page_view_mobile()->attach($request->pageViewMobile_id);

            DB::commit();
            return $this->sendResponse([],'Data exited successfully');

        }catch (\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    }

    public function statusPackage(Request $request)
    {
        DB::beginTransaction();
        try{

            $package = AdvertisingPackage::find($request->id);

            $package->update(['status' => $request->status]);

            DB::commit();
            return $this->sendResponse([],'Data exited successfully');

        }catch (\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    }

    public function show($id)
    {
        try {

            $package = AdvertisingPackage::with(['page_view.Page.views','page_view_mobile.pageMobile.views'])->find($id);

            return $this->sendResponse(['package'=> $package],'Data exited successfully');

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }

    }

    public function edit($id)
    {
        try {

            $dataPackage = AdvertisingPackage::with(['page_view','page_view_mobile'])->find($id)->makeVisible('translations');

            if($dataPackage){

                $pageView = AdvertisingPage::with('views:id')->get();

                $pageViewMobile = AdvertisingPageMobile::with('views:id')->get();

                return $this->sendResponse(['pageView' => $pageView, 'pageViewMobile' => $pageViewMobile,'Package' => $dataPackage],'Data exited successfully');
            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
//        try{

            $advertisingPackage = AdvertisingPackage::find($id);

            if($advertisingPackage){

                // Validator request
                $v = Validator::make($request->all(), [
                    'name_ar' => ['required', Rule::unique('advertising_package_translations','name')->whereNot('package_id',$id)],
                    'name_en' => ['required', Rule::unique('advertising_package_translations','name')->whereNot('package_id',$id)],
                    'period'  => 'required|integer',
                    'visiter_num' => 'required|integer',
                    'price' => 'required|integer',
                    'pageView_id' => 'required|array',
                    'pageView_id.*' => 'required|integer',
                    'pageViewMobile_id' => 'required|array',
                    'pageViewMobile_id.*' => 'required|integer'
                ]);

                if ($v->fails()) {
                    return $this->sendError('There is an error in the data', $v->errors());
                }

                $en =  ['name' => $request->name_en];
                $ar= ['name' => $request->name_ar];
                $data = [
                    'period' => $request->period ,
                    'visiter_num'  => $request->visiter_num,
                    'price'  => $request->price,
                    'en' => $en,
                    'ar' => $ar
                ];

                $advertisingPackage->update($data);

                $advertisingPackage->page_view()->sync($request->pageView_id);

                $advertisingPackage->page_view_mobile()->sync($request->pageViewMobile_id);

                DB::commit();

                return $this->sendResponse([],'Data exited successfully');


            }else{
                return $this->sendError('ID is not exist');
            }

//        }catch (\Exception $e){
//
//            DB::rollBack();
//            return $this->sendError('An error occurred in the system');
//        }
    }


    public function destroy($id)
    {
        try {
            $advertisingPackage = AdvertisingPackage::find($id);
            if ($advertisingPackage){

                $advertisingPackage->delete();
                return $this->sendResponse([],'Deleted successfully');
            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }
    }
}
