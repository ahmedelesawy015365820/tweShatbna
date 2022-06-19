<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Architectural;
use App\Models\CompanyProject;
use App\Models\DesignProject;
use App\Models\ExpectedBudget;
use App\Models\Unity;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AddProjectController extends Controller
{

    use Message;

    public function getService()
    {
        $budgets = ExpectedBudget::select('to','id','from')->get();
        $unities = Unity::whereStatus(true)->get();
        $architecturals = Architectural::whereStatus(true)->get();

        return $this->sendResponse(['Budgets' => $budgets,'unities'=> $unities,'architecturals' => $architecturals], 'Data exited successfully');
    }

    public function addCompany(Request $request)
    {

        try {
            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'name' => 'required',
                'area' => 'required',
                'height' => 'required',
                'room' => 'required',
                'bathroom' => 'required',
                'description' => 'required',
                'unity' => 'required|integer|exists:unities,id',
                'architectural' => 'required|integer|exists:architecturals,id',
                'expected_budget' => 'required|integer|exists:expected_budgets,id',
                'files' => 'nullable',
                'files.*' => 'nullable'.($request->hasFile('files')?'|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000':''),
                'vedio' => 'nullable'.($request->hasFile('vedio')?'mimes:mp4,webm|max:20480':''),
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $user = auth()->guard('api')->user()->id;

            $company = CompanyProject::create([
                'name' => $request->name,
                'area' => $request->area,
                'height' => $request->height,
                'room' => $request->room,
                'bathroom' => $request->bathroom,
                'description' => $request->description,
                "user_id" => $user,
                'expected_budget_id' => $request->expected_budget,
            ]);

            $company->unity()->attach($request->unity);

            $company->architectural()->attach($request->architectural);

            if($request->hasFile('vedio')){

                    $file_size = $request->vedio->getSize();
                    $file_type = $request->vedio->getMimeType();
                    $vedio = time() .'.'. $request->file->getClientOriginalName();

                    // picture move
                $request->vedio->storeAs('companyProject/'.$company->id, $vedio,'general');

                $company->media()->create([
                        'file_name' => $vedio ,
                        'file_size' => $file_size,
                        'file_type' => $file_type,
                        'file_sort' => 1
                    ]);

            }

            $i = 0;
            if($request->hasFile('files')){
                foreach($request->file('files') as $index => $file){

                    $file_size = $file->getSize();
                    $file_type = $file->getMimeType();
                    $image = time() .'.'. $file->getClientOriginalName();

                    // picture move
                    $file->storeAs('companyProject/'.$company->id, $image,'general');

                    $company->media()->create([
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

    }

    public function addDesign(Request $request)
    {

        try {
            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'name' => 'required',
                'area' => 'required',
                'height' => 'required',
                'room' => 'required',
                'bathroom' => 'required',
                'description' => 'required',
                'unity' => 'required|integer|exists:unities,id',
                'architectural' => 'required|integer|exists:architecturals,id',
                'expected_budget' => 'required|integer|exists:expected_budgets,id',
                'files' => 'nullable',
                'files.*' => 'nullable'.($request->hasFile('files')?'|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000':''),
                'vedio' => 'nullable'.($request->hasFile('vedio')?'|mimes:mp4,webm|max:20480':''),
            ]);


            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $user = auth()->guard('api')->user()->id;

            $desgin = DesignProject::create([
                'name' => $request->name,
                'area' => $request->area,
                'height' => $request->height,
                'room' => $request->room,
                'bathroom' => $request->bathroom,
                'description' => $request->description,
                "user_id" => $user,
                'expected_budget_id' => $request->expected_budget,
            ]);

            $desgin->unity()->attach($request->unity);

            $desgin->architectural()->attach($request->architectural);

            if($request->hasFile('vedio')){

                $file_size = $request->vedio->getSize();
                $file_type = $request->vedio->getMimeType();
                $vedio = time() .'.'. $request->file->getClientOriginalName();

                // picture move
                $request->vedio->storeAs('designProject/'.$desgin->id, $vedio,'general');

                $desgin->media()->create([
                    'file_name' => $vedio ,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1
                ]);

            }

            $i = 0;
            if($request->hasFile('files')){
                foreach($request->file('files') as $index => $file){

                    $file_size = $file->getSize();
                    $file_type = $file->getMimeType();
                    $image = time() .'.'. $file->getClientOriginalName();

                    // picture move
                    $file->storeAs('designProject/'.$desgin->id, $image,'general');

                    $desgin->media()->create([
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

    }

}
