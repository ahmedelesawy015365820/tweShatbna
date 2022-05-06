<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\DesignDetail;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DesignEditProfile extends Controller
{
     use Message;

     public function getBank()
     {
         $user = auth()->guard('api')->user();

         $bank = Bank::whereUserId($user->id)->get();

         return $this->sendResponse(['banks' => $bank], 'Data exited successfully');
     }

    public function storeBank(Request $request)
    {

        try{

            // Validator request
            $v = Validator::make($request->all(), [
                'name' => 'required',
                'address' => 'required',
                'iban' => 'required',
                'swift' => 'present'
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $user = auth()->guard('api')->user();

            $user->banks()->create([
                'name' => $request->name,
                'address' => $request->address,
                'iban' => $request->iban,
                'swift' => $request->swift
            ]);

            DB::commit();
            return $this->sendResponse([], 'Data exited successfully');

        }catch (\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }

    public function deleteBank($id)
    {

        try {
            $bank = Bank::find($id);
            if ($bank){

                $bank->delete();
                return $this->sendResponse([],'Deleted successfully');
            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }

    }

    public function getDesignDetails()
    {
        $user = auth()->guard('api')->user();

        $detail = DesignDetail::whereUserId($user->id)->first();

        return $this->sendResponse(['detail' => $detail], 'Data exited successfully');
    }

    public function storeDesignDetail(Request $request)
    {
        DB::beginTransaction();
        try {

            $user = auth()->guard('api')->user();

            $detail = DesignDetail::whereUserId($user->id)->update([
                'vision' => $request->vision,
                'message' => $request->message,
                'strategy' => $request->strategy
            ]);

            DB::commit();
            return $this->sendResponse([], 'Data exited successfully');

        } catch (\Exception $e) {

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    }

}
