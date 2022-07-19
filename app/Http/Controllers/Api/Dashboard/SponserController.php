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
        DB::beginTransaction();
        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'name_ar' => 'required|string',
                'name_en' => 'required|string',
                'description1_ar' => 'required|string',
                'description1_en' => 'required|string',
                'description2_ar' => 'required|string',
                'description2_en' => 'required|string',
                'email' => 'required|string',
                'location' => 'required|string',
                'phone' => 'required|string',
                'file' => 'nullable'.($request->hasFile('file')?'|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=10,min_height=10,max_width=50,max_height=50':''),
                'banners' => 'nullable'.($request->hasFile('banners')?'|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=10,min_height=10,max_width=50,max_height=50':''),
            ]);


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

            $sponser->details()->create([
                
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
