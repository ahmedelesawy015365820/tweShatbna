<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\AddShowDesign;
use App\Models\CompanyProject;
use App\Models\DesignProject;
use App\Models\Setting;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ShowProjectController extends Controller
{

    use Message;

    public function showCompany(Request $request)
    {

        $sort_field ='id' ;
        $sort_type = 'desc';

        switch ($request->sortingBy){

            case 'popularity':
                $sort_field ='id' ;
                $sort_type = 'asc';
                break;

            case 'low-high':
                $sort_field ='price' ;
                $sort_type = 'asc';
                break;

            case 'high-low':
                $sort_field ='price' ;
                $sort_type = 'desc';
                break;

            default :
                $sort_field ='id' ;
                $sort_type = 'desc';
        }

        $companies = CompanyProject::
                    with('user:id,name','unity','architectural','ExpectedBadget:id,to,from')
                    ->orderBy($sort_field,$sort_type)
                    ->paginate(16);


        return $this->sendResponse(['companies' => $companies],'Data exited successfully');

    }

    public function showDesign(Request $request)
    {

        $sort_field ='id' ;
        $sort_type = 'desc';

        switch ($request->sortingBy){

            case 'popularity':
                $sort_field ='id' ;
                $sort_type = 'asc';
                break;

            case 'low-high':
                $sort_field ='price' ;
                $sort_type = 'asc';
                break;

            case 'high-low':
                $sort_field ='price' ;
                $sort_type = 'desc';
                break;

            default :
                $sort_field ='id' ;
                $sort_type = 'desc';
        }

        $designs = DesignProject::
        with('user:id,name','unity','architectural','ExpectedBadget:id,to,from')
        ->orderBy($sort_field,$sort_type)
        ->paginate(16);


        return $this->sendResponse(['designs' => $designs],'Data exited successfully');
    }

    public function showDesDetail($id)
    {

        $detail = DesignProject::
        with('user:id,name','unity','architectural','ExpectedBadget:id,to,from')
        ->find($id);

        $setting = Setting::select('commission_design')->first();

        return $this->sendResponse(['detail' => $detail,'setting' => $setting],'Data exited successfully');

    }

    public function showComDetail($id)
    {

        $detail = CompanyProject::
        with('user:id,name','unity','architectural','ExpectedBadget:id,to,from')
        ->find($id);


        return $this->sendResponse(['detail' => $detail],'Data exited successfully');

    }

    public function addShow(Request $request,$id)
    {

        try{
            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'day' => 'required',
                'value' => 'required',
                'description' => 'required',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $setting = Setting::get()->first()->commission_design;

            $commission = $request->value * ($setting/100);

            DesignProject::find($id)->addShowDesign()->create([
                'day' => $request->day,
                'value' => $request->value,
                'commission' => $commission,
                'description' => $request->description,
                'user_id' => auth()->guard('api')->user()->id,
            ]);

            DB::commit();
            return $this->sendResponse([],'Data exited successfully');

        }catch (\Exception $e){
            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }

}
