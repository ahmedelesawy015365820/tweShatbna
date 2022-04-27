<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\DegreeDesign;
use App\Models\DesignDesScience;
use App\Models\Designer;
use App\Models\DesignService;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DesignController extends Controller
{
    use Message;


    public function trustDesginOne(Request $request)
    {

        DB::beginTransaction();
        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'name' => 'required',
                'address' => 'required',
                'iban' => 'required',
                'swift' => 'present',
                'files' => 'required',
                'files.*' => 'file|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=100px,min_height=100,max_width=1000,max_height=1000'
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $user = auth()->guard('api')->user();

            $i = 0;

            foreach ($request->file('files') as $file){

                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $image = time() .$i .'.'. $file->getClientOriginalName();

                // picture move
                $file->storeAs($user->id, $image,'trustDesign');

                Designer::whereUserId($user->id)->first()->media()->create([
                    'file_name' => $image ,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => $i
                ]);

                $i++;
            }

            $user->banks()->create([
                'name' => $request->name,
                'address' => $request->address,
                'iban' => $request->iban,
                'swift' => $request->swift
            ]);

            DB::commit();
            return $this->sendResponse([], 'Data exited successfully');

        } catch (\Exception $e) {

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    } // ******************End trustDesgin1*********************//

    public function trustDesginTwe(Request $request)
    {

        DB::beginTransaction();
        try {

            $user = auth()->guard('api')->user();

            if($request->noDegree){

                DesignDesScience::create([
                     'user_id' => $user->id
                ]);

                DB::commit();
                return $this->sendResponse([], 'Data exited successfully');

            }
            else{
                // Validator request
                $v = Validator::make($request->all(), [
                    'nameService' => 'required|array',
                    'nameDegree' => 'required|array',
                    'experience' => 'required|integer',
                    'subject' => 'required',
                    'description' => 'required'
                ]);

                if ($v->fails()) {
                    return $this->sendError('There is an error in the data', $v->errors());
                }

                $user->designService()->attach($request->nameService);

                $user->designDegree()->attach($request->nameDegree);

                $user->designDesScience()->create([
                    'experience' => $request->experience,
                    'subject' => $request->subject,
                    'description' => $request->description
                ]);

                DB::commit();
                return $this->sendResponse([], 'Data exited successfully');

            }

        } catch (\Exception $e) {

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    } // ******************End trustDesgin2*********************//

    public function trustDesginThree(Request $request)
    {

        DB::beginTransaction();
        try {
            // Validator request
            $v = Validator::make($request->all(), [
                'vision' => 'required',
                'message' => 'required',
                'strategy' => 'required'
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $user = auth()->guard('api')->user();

            $user->designDetail()->create([
                'vision' => $request->vision,
                'message' => $request->message,
                'strategy' => $request->strategy
            ]);

            Designer::whereUserId($user->id)->first()->update(['send' => 1]);

            DB::commit();
            return $this->sendResponse([], 'Data exited successfully');

        } catch (\Exception $e) {

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    }// ******************End trustDesgin3*********************//

    public function degreeService()
    {

        $degrees = DegreeDesign::get();
        $services = DesignService::get();

        return $this->sendResponse(['degrees' => $degrees, 'services' => $services], 'Data exited successfully');
    }

}
