<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PrivacyController extends Controller
{

    use Message;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $privacy = Privacy::paginate(5);

        return $this->sendResponse(['privacies' => $privacy],'Data exited successfully');
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'ar.title' => ['required'],
                'en.title' => ['required'],
                'ar.description' => ['required'],
                'en.description' => ['required'],
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $data = $request->only(['en','ar']);

            Privacy::create($data);

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

            $privacy = Privacy::find($id)->makeVisible('translations');

            return $this->sendResponse(['privacy' => $privacy],'Data exited successfully');

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
            $privacy = Privacy::find($id);
            if($privacy){
                // Validator request
                $v = Validator::make($request->all(), [
                    'ar.title' => ['required'],
                    'en.title' => ['required'],
                    'ar.description' => ['required'],
                    'en.description' => ['required'],
                ]);

                if ($v->fails()) {
                    return $this->sendError('There is an error in the data', $v->errors());
                }

                $data = $request->only(['en','ar']);

                $privacy->update($data);

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $privacy = Privacy::find($id);
            if ($privacy){

                $privacy->delete();
                return $this->sendResponse([],'Deleted successfully');
            }else{
                return $this->sendError('ID is not exist');
            }
        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }
    }
}
