<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CompanyService;
use App\Models\UserCompanyService;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CompanyServiceController extends Controller
{

    use Message;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = CompanyService::when($request->search,function ($q) use($request){
            return $q->whereRelation('translations','name','like','%'.$request->search.'%');
        })->latest()->paginate(5);

        return $this->sendResponse(['services' => $services],'Data exited successfully');
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'ar.name' => ['required', Rule::unique('company_service_translations','name')],
                'en.name' => ['required', Rule::unique('company_service_translations','name')],
                'status' => 'present',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $data = $request->only(['en','ar','status']);

            CompanyService::create($data);

            DB::commit();
            return $this->sendResponse([],'Data exited successfully');
        }catch (\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }



    public function edit($id)
    {
        try {

            $service = CompanyService::find($id)->makeVisible('translations');

            return $this->sendResponse(['service' => $service],'Data exited successfully');

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $companyService = CompanyService::find($id);
            if($companyService){
                // Validator request
                $v = Validator::make($request->all(), [
                    'ar.name' => ['required', Rule::unique('company_service_translations','name')->whereNot('company_service_id',$id)],
                    'en.name' => ['required', Rule::unique('company_service_translations','name')->whereNot('company_service_id',$id)],
                    'status'        => 'present'
                ]);

                if ($v->fails()) {
                    return $this->sendError('There is an error in the data', $v->errors());
                }

                $data = $request->only(['en','ar','status']);

                $companyService->update($data);

                DB::commit();
                return $this->sendResponse([],'Data exited successfully');
            }else{
                return $this->sendError('ID is not exist');
            }
        }catch (\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }


    public function destroy($id)
    {
        try {
            $service = CompanyService::find($id);
            if ($service){
                $user = UserCompanyService::whereCompanyServiceId ($service->id)->first();
                if(!$user){

                    $service->delete();

                    return $this->sendResponse([],'Deleted successfully');
                }else{
                    return $this->sendError('An error occurred in the system',['complement']);
                }
            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }
    }
}
