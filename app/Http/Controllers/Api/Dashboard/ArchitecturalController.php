<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Architectural;
use App\Models\CompanyProject;
use App\Models\DesignProject;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ArchitecturalController extends Controller
{
    use Message;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $architectural = Architectural::when($request->search,function ($q) use($request){
            return $q->whereRelation('translations','name','like','%'.$request->search.'%');
        })->latest()->paginate(5);

        return $this->sendResponse(['architectural' => $architectural],'Data exited successfully');
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'ar.name' => ['required', Rule::unique('architectural_translations','name')],
                'en.name' => ['required', Rule::unique('architectural_translations','name')],
                'status' => 'present',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $data = $request->only(['en','ar','status']);

            Architectural::create($data);

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

            $architectural = Architectural::find($id)->makeVisible('translations');

            return $this->sendResponse(['architectural' => $architectural],'Data exited successfully');

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $architectural = Architectural::find($id);
            if($architectural){
                // Validator request
                $v = Validator::make($request->all(), [
                    'ar.name' => ['required', Rule::unique('architectural_translations','name')->whereNot('architectural_id',$id)],
                    'en.name' => ['required', Rule::unique('architectural_translations','name')->whereNot('architectural_id',$id)],
                    'status'        => 'present'
                ]);

                if ($v->fails()) {
                    return $this->sendError('There is an error in the data', $v->errors());
                }

                $data = $request->only(['en','ar' ,'status']);

                $architectural->update($data);

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
            $architectural = Architectural::find($id);
            if ($architectural){

                $project = CompanyProject::whereArchitecturalId($architectural->id)->first();
                $project2 = DesignProject::whereArchitecturalId($architectural->id)->first();

                if(!$project || !$project2){

                    $architectural->delete();

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
