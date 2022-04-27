<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertiseScheduleResource;
use App\Models\AdvertiseSchedule;
use App\Traits\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdvertiserScheduleController extends Controller
{

    use Message;

    public function index(Request $request)
    {
        $schedule = AdvertiseSchedule::with(['packages:id','users:name,id'])
            ->when($request->search,function ($q) use($request){
                return $q->where('title','like','%'.$request->search.'%');
            })
            ->paginate(10);

        return $this->sendResponse(['schedule' => $schedule], 'Data exited successfully');

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'start' => 'required|date|after_or_equal:'. now()->toDateString(),
                'end' => 'required|date|after_or_equal:start',
                'package' => 'required|integer|exists:advertising_packages,id',
                'user' => 'required|integer|exists:users,id',
                'package_sale' => 'required|integer|exists:users,id',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors(), 401);
            }

            $AdvertiseSchedules = AdvertiseSchedule::
                where('advertising_package_id', $request->package)
                ->whereBetween('end', [now(), now()->addMonths(5)])
                ->get();

            $end_date = Carbon::parse($request->end)->format('Y-m-d H:i');
            $start_date = Carbon::parse($request->start)->format('Y-m-d H:i');

            foreach ($AdvertiseSchedules as $AdvertiseSchedule) {

                if(
                    (($AdvertiseSchedule->start <= $start_date) && ($AdvertiseSchedule->end >= $start_date)) ||
                    (($AdvertiseSchedule->start <= $end_date) && ($AdvertiseSchedule->end >= $end_date))
                ){
                    return $this->sendError('The appointment has already been booked',401);
                }

            }


            AdvertiseSchedule::create([
                'start' => $request->start,
                'end' => $request->end,
                'title' => $request->title,
                'advertising_package_id' => $request->package,
                'user_id' => $request->user,
                'package_sale_id' => $request->package_sale,
            ]);

            DB::commit();
            return $this->sendResponse([], 'Data exited successfully');

        } catch (\Exception $e) {

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }

    public function  getALL()
    {
        $schedule = AdvertiseSchedule::all();

        return $this->sendResponse(['schedule' => AdvertiseScheduleResource::collection($schedule)], 'Data exited successfully');
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
