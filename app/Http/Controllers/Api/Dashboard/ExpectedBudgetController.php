<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CompanyProject;
use App\Models\DesignProject;
use App\Models\ExpectedBudget;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExpectedBudgetController extends Controller
{
    use Message;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $expected = ExpectedBudget::latest()->paginate(5);

        return $this->sendResponse(['expected' => $expected],'Data exited successfully');
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'from' => ['required'],
                'to' => ['required'],
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $data = $request->only(['to','from']);

            ExpectedBudget::create($data);

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

            $expected = ExpectedBudget::find($id)->makeVisible('translations');

            return $this->sendResponse(['expected' => $expected],'Data exited successfully');

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $expected = ExpectedBudget::find($id);
            if($expected){
                // Validator request
                $v = Validator::make($request->all(), [
                    'from' => ['required'],
                    'to' => ['required'],
                ]);

                if ($v->fails()) {
                    return $this->sendError('There is an error in the data', $v->errors());
                }

                $data = $request->only(['to','from']);

                $expected->update($data);

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
            $expected = ExpectedBudget::find($id);
            if ($expected){

                $project = CompanyProject::whereExpectedBudgetId($expected->id)->first();
                $project2 = DesignProject::whereExpectedBudgetId($expected->id)->first();

                if(!$project || !$project2){

                    $expected->delete();

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
