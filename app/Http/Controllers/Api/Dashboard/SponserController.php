<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Sponser;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SponserController extends Controller
{

    use Message;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponser = Sponser::latest()->paginate(10);

        return $this->sendResponse(['sponser' => $sponser],'Data exited successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        DB::beginTransaction();
//        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'name_ar' => 'required|string',
                'name_en' => 'required|string',
                'description1_ar' => 'required|string',
                'description1_en' => 'required|string',
                'description2_ar' => 'required|string',
                'description2_en' => 'required|string',
                'location_ar' => 'required|string',
                'location_en' => 'required|string',
                'email' => 'required|string',
                'phone' => 'required|string',
                'file' => 'required|mimes:jpeg,jpg,png,webp',
                'banners' => 'required',
                'banners.*' => 'required|mimes:jpeg,jpg,png,webp',
            ]);

//            |max:2048|dimensions:min_width=170,min_height=120,max_width=170,max_height=120
//            |max:2048|dimensions:min_width=275,min_height=275,max_width=275,max_height=275

            $sponser = Sponser::create([
                'ar'=> [
                    "name" => $request->name_ar,
                    "description" => $request->description1_ar
                ],
                'en' => [
                    "name" => $request->name_en,
                    "description" => $request->description1_en
                ],
            ]);

            $Details = $sponser->details()->create([
                'ar'=> [
                    "location" => $request->location_ar,
                    "description" => $request->description2_ar
                ],
                'en' => [
                    "location" => $request->location_en,
                    "description" => $request->description2_en
                ],
                "email" => $request->email,
                "phone" => $request->phone
            ]);

            $file_size = $request->file->getSize();
            $file_type = $request->file->getMimeType();
            $image = time().'.'. $request->file->getClientOriginalName();

            // picture move
            $request->file->storeAs('sponser', $image,'general');

            $sponser->media()->create([
                'file_name' => $image ,
                'file_size' => $file_size,
                'file_type' => $file_type,
                'file_sort' => 1
            ]);

            $i = 0;
            foreach($request->file('banners') as $index => $file){

                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $image = time().$i.'.'. $file->getClientOriginalName();

                // picture move
                $file->storeAs('sponser', $image,'general');

                $Details->media()->create([
                    'file_name' => $image ,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => $i
                ]);

                $i++;
            }

            DB::commit();
            return $this->sendResponse([],'Data exited successfully');
//        }catch (\Exception $e){
//
//            DB::rollBack();
//            return $this->sendError('An error occurred in the system');
//        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
//        'file' => 'nullable'.($request->hasFile('file')?'|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=10,min_height=10,max_width=50,max_height=50':''),
//                'banners.*' => 'nullable'.($request->hasFile('banners')?'|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=10,min_height=10,max_width=50,max_height=50':''),
//        if($request->hasFile('file')){
//
//            if(File::exists('web/img/banner/'.$sponser->media->file_name)){
//                unlink('web/img/banner/'. $sponser->media->file_name);
//            }
//            $banner->media->delete();
//
//            $file_size = $request->file->getSize();
//            $file_type = $request->file->getMimeType();
//            $image = time().'.'. $request->file->getClientOriginalName();
//
//            // picture move
//            $request->file->storeAs('banner', $image,'general');
//
//            $banner->media()->create([
//                'file_name' => $image ,
//                'file_size' => $file_size,
//                'file_type' => $file_type,
//                'file_sort' => 1
//            ]);
//
//        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
