<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CompanyProject;
use App\Models\DesignProject;
use App\Models\Unity;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UnityController extends Controller
{

    use Message;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $unity = Unity::when($request->search,function ($q) use($request){
            return $q->whereRelation('translations','name','like','%'.$request->search.'%');
        })->latest()->paginate(5);

        return $this->sendResponse(['unity' => $unity],'Data exited successfully');
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'ar.name' => ['required', Rule::unique('unity_translations','name')],
                'en.name' => ['required', Rule::unique('unity_translations','name')],
                'status' => 'present',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $data = $request->only(['en','ar','status']);

            Unity::create($data);

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

            $unity = Unity::find($id)->makeVisible('translations');

            return $this->sendResponse(['unity' => $unity],'Data exited successfully');

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $unity = Unity::find($id);
            if($unity){
                // Validator request
                $v = Validator::make($request->all(), [
                    'ar.name' => ['required', Rule::unique('unity_translations','name')->whereNot('unity_id',$id)],
                    'en.name' => ['required', Rule::unique('unity_translations','name')->whereNot('unity_id',$id)],
                    'status'        => 'present'
                ]);

                if ($v->fails()) {
                    return $this->sendError('There is an error in the data', $v->errors());
                }

                $data = $request->only(['en','ar' ,'status']);

                $unity->update($data);

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
            $unity = Unity::find($id);
            if ($unity){

                $project = CompanyProject::whereUnityId($unity->id)->first();
                $project2 = DesignProject::whereUnityId($unity->id)->first();

                if(!$project || !$project2){

                    $unity->delete();

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
