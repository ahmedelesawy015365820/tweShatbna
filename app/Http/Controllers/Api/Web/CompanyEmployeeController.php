<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\CompanyEmpolyee;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CompanyEmployeeController extends Controller
{
    use Message;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empolyees = CompanyEmpolyee::with('media:mediable_id,file_name')->paginate(5);

        return $this->sendResponse(['empolyees' => $empolyees],'Data exited successfully');
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'name_ar' => ['required'],
                'name_en' => ['required'],
                'job_ar' => ['required'],
                'job_en' => ['required'],
                'file' => 'file|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=50,min_height=50,max_width=300,max_height=300',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $user_id = auth('api')->user()->id;

            $empolyee= CompanyEmpolyee::create([
                'ar'=> ['name' => $request->name_ar,'job' => $request->job_ar],
                'en' => ['name' => $request->name_en,'job' => $request->job_en],
                'user_id' => $user_id
            ]);

            $file_size = $request->file->getSize();
            $file_type = $request->file->getMimeType();
            $image = time().'.'. $request->file->getClientOriginalName();

            // picture move
            $request->file->storeAs('companyEmployee', $image,'general');

            $empolyee->media()->create([
                'file_name' => $image ,
                'file_size' => $file_size,
                'file_type' => $file_type,
                'file_sort' => 1
            ]);

            DB::commit();
            return $this->sendResponse([],'Data exited successfully');
        }catch (\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $employee = CompanyEmpolyee::find($id);

            // Validator request
            $v = Validator::make($request->all(), [
                'name_ar' => ['required'],
                'name_en' => ['required'],
                'job_ar' => ['required'],
                'job_en' => ['required'],
                'file' => 'nullable'.($request->hasFile('file')?'|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=50,min_height=50,max_width=300,max_height=300':''),
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $employee->update([
                'ar'=> ['name' => $request->name_ar,'job' => $request->job_ar],
                'en' => ['name' => $request->name_en,'job' => $request->job_en],
            ]);

            if($request->hasFile('file')){

                if(File::exists('web/img/companyEmployee/'.$employee->media->file_name)){
                    unlink('web/img/companyEmployee/'. $employee->media->file_name);
                }
                $employee->media->delete();

                $file_size = $request->file->getSize();
                $file_type = $request->file->getMimeType();
                $image = time().'.'. $request->file->getClientOriginalName();

                // picture move
                $request->file->storeAs('companyEmployee', $image,'general');

                $employee->media()->create([
                    'file_name' => $image ,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1
                ]);

            }

            DB::commit();
            return $this->sendResponse([],'Data exited successfully');
        }catch (\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $employee = CompanyEmpolyee::find($id);
            if ($employee){

                    if(File::exists('web/img/companyEmployee/'.$employee->media->file_name)){
                        unlink('web/img/companyEmployee/'. $employee->media->file_name);
                    }
                $employee->media->delete();

                $employee->delete();

                    return $this->sendResponse([],'Deleted successfully');

            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }
    }
}
