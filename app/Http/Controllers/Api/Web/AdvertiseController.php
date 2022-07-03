<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertiserResource;
use App\Http\Resources\AdvertiseScheduleResource;
use App\Http\Resources\UserResource;
use App\Models\Advertiser;
use App\Models\AdvertiseSchedule;
use App\Models\AdvertisingPackage;
use App\Models\PackageSale;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdvertiseController extends Controller
{

    use Message;

    public function advertise()
    {
        $user = auth()->guard('api')->user();

        $userResource = new UserResource($user);

        $advertiser = new AdvertiserResource(Advertiser::whereUserId($user->id)->first());

        return $this->sendResponse(['user' => $userResource,'advertiser' => $advertiser],'Data exited successfully');

    }//**********end advertise************/

    public function index()
    {

        try{
            $Advertise = AdvertisingPackage::whereStatus(true)->with(['page_view.Page','page_view.view','page_view_mobile.pageMobile','page_view_mobile.view'])->get();

            return $this->sendResponse(['packages' => $Advertise],'Data exited successfully');

        }catch(\Exception $e){
            return $this->sendError('An error occurred in the system');
        }

    }//**********end advertise************/

    public function buy_package(Request $request)
    {
        try{
            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'package' => 'required|integer|exists:advertising_packages,id',
                'files' => 'required',
                'files.*' => 'file|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=100,min_height=100,max_width=500,max_height=500',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $user = auth()->guard('api')->user()->id;

            $sale = PackageSale::create(['advertising_package_id' => $request->package]);

            $sale->user()->attach($user);

            $i = 0;
            if($request->hasFile('files')){
                foreach($request->file('files') as $index => $file){

                    $file_size = $file->getSize();
                    $file_type = $file->getMimeType();
                    $image = time() .'.'. $file->getClientOriginalName();

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

            DB::commit();
            return $this->sendResponse([],'Data exited successfully');

        }catch (\Exception $e){
            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    }//**********end buy_package************/

    public function numPackage(Request $request)
    {
        $user = auth()->guard('api')->user()->id;

        $numPackage = AdvertiseSchedule::whereUserId($user)->count();

        return $this->sendResponse(
            [
             'numPackage'=>$numPackage,
            ],
            'Data exited successfully'
        );

    }//**********end numPackage************/

    public function package(Request $request)
    {
        $user = auth()->guard('api')->user()->id;

        $advertise = AdvertiseSchedule::
        select('id','advertising_package_id','start','end')->
        whereUserId($user)->
        whereStatus(true)->
        with('packages:id,period,visiter_num,price')->
        paginate(10);

        return $this->sendResponse(
            [
                'advertises' => $advertise
            ],
            'Data exited successfully'
        );

    }//**********end Packages************/

    public function  getALL($id)
    {
        try{
            $schedule = AdvertiseSchedule::
                where([
                        ['advertising_package_id', $id],
                    ])
                ->whereBetween('created_at', [now()->subMonth(), now()->addMonths(5)])
                ->get();

            return $this->sendResponse(['schedule' => AdvertiseScheduleResource::collection($schedule)], 'Data exited successfully');

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }
    }

}
