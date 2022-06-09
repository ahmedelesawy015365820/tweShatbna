<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Complement;
use App\Models\Country;
use App\Models\Media;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CountryController extends Controller
{

    use Message;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Country::when($request->search,function ($q) use($request){
            return $q->where('name','like','%'.$request->search.'%');
        })->latest()->paginate(5);

        return $this->sendResponse(['countries' => $countries],'Data exited successfully');
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'ar' => ['required', Rule::unique('country_translations','name')],
                'en' => ['required', Rule::unique('country_translations','name')],
                'code'    => 'required',
                'status'        => 'present',
                'file' => 'file|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=10,min_height=10,max_width=50,max_height=50',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

             $country= Country::create([
                 'ar'=> ['name' => $request->ar],
                 'en' => ['name' => $request->en],
                 'code' => $request->code,
                 'status' => $request->status
             ]);

            $file_size = $request->file->getSize();
            $file_type = $request->file->getMimeType();
            $image = time().'.'. $request->file->getClientOriginalName();

            // picture move
            $request->file->storeAs('country', $image,'country');

            $country->media()->create([
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $country = Country::with('media:mediable_id,file_name')->find($id)->makeVisible('translations');

            return $this->sendResponse(['country' => $country],'Data exited successfully');

        }catch (\Exception $e){

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

            $country = Country::find($id);

            // Validator request
            $v = Validator::make($request->all(), [
                'ar' => ['required', Rule::unique('country_translations','name')->whereNot('country_id',$id)],
                'en' => ['required', Rule::unique('country_translations','name')->whereNot('country_id',$id)],
                'code'    => 'required',
                'status'        => 'present',
                'file' => 'nullable'.($request->hasFile('file')?'|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=10,min_height=10,max_width=50,max_height=50':''),
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $country->update([
                'ar'=> ['name' => $request->ar],
                'en' => ['name' => $request->en],
                'code' => $request->code,
                'status' => $request->status
            ]);

            if($request->hasFile('file')){

                if(File::exists('web/img/country/'.$country->media->file_name)){
                    unlink('web/img/country/'. $country->media->file_name);
                }
                $country->media->delete();

                $file_size = $request->file->getSize();
                $file_type = $request->file->getMimeType();
                $image = time().'.'. $request->file->getClientOriginalName();

                // picture move
                $request->file->storeAs('country', $image,'country');

                $country->media()->create([
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
            $country = Country::find($id);
            if ($country){
                $complement = Complement::whereCountryId($country->id)->first();
                if(!$complement){


                    if(File::exists('web/img/country/'.$country->media->file_name)){
                        unlink('web/img/country/'. $country->media->file_name);
                    }
                    $country->media->delete();

                    $country->delete();

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
