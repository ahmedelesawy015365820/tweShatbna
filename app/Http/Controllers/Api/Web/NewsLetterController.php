<?php

namespace App\Http\Controllers\Api\web;

use App\Http\Controllers\Controller;
use App\Models\ContactSupport;
use App\Models\NewsLetter;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NewsLetterController extends Controller
{
    public function index(){

        return 1;
    }

    use Message;

    public function newsLetter(Request $request)
    {
        DB::beginTransaction();
        try{

            // Validator request
            $v = Validator::make($request->all(), [
                'email' => 'required|string|email',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $email = NewsLetter::whereEmail($request->email)->first();

            if($email){
                DB::commit();
                return $this->sendResponse([],'Data exited successfully');

            }else{

                NewsLetter::create([
                    'email' => $request->email
                ]);

                DB::commit();
                return $this->sendResponse([],'Data exited successfully');
            }


        }catch (\Exception $e){
            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }

    public function support(Request $request)
    {
        DB::beginTransaction();
        try{

            // Validator request
            $v = Validator::make($request->all(), [
                'email' => 'required|string|email',
                'first' => 'required|string',
                'last' => 'required|string',
                'phone' => 'required',
                'description' => 'required'
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            ContactSupport::create([
                'email' => $request->email,
                'first' => $request->first,
                'last' => $request->last,
                'phone' => $request->phone,
                'description' => $request->description
            ]);

            DB::commit();
            return $this->sendResponse([],'Data exited successfully');

        }catch (\Exception $e){
            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }
}
