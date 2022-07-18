<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BannerController extends Controller
{

    use Message;

    public function index()
    {
        $banner = Banner::with('media:mediable_id,file_name')->get();

        return $this->sendResponse(['banner' => $banner],'Data exited successfully');
    }

    public function edit($id)
    {
        try {

            $Banner = Banner::with('media:mediable_id,file_name')->find($id);

            return $this->sendResponse(['banner' => $Banner],'Data exited successfully');

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

            $banner = Banner::find($id);

            // Validator request
            $v = Validator::make($request->all(), [
                'title1_ar' => 'required',
                'title1_en' => 'required',
                'title2_ar' => 'required',
                'title2_en' => 'required',
                'title3_ar' => 'required',
                'title3_en' => 'required',
                'file' => 'nullable'.($request->hasFile('file')?'|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=10,min_height=10,max_width=50,max_height=50':''),
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $banner->update([
                'ar'=> [
                    'title1' => $request->title1_ar,
                    'title2' => $request->title2_ar,
                    'title3' => $request->title3_ar
                ],
                'en' => [
                    'title1' => $request->title1_en,
                    'title2' => $request->title2_en,
                    'title3' => $request->title3_en,
                    ],
            ]);

            if($request->hasFile('file')){

                if(File::exists('web/img/banner/'.$banner->media->file_name)){
                    unlink('web/img/banner/'. $banner->media->file_name);
                }
                $banner->media->delete();

                $file_size = $request->file->getSize();
                $file_type = $request->file->getMimeType();
                $image = time().'.'. $request->file->getClientOriginalName();

                // picture move
                $request->file->storeAs('banner', $image,'general');

                $banner->media()->create([
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

}
