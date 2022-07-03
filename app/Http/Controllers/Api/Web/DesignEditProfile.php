<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\DegreeDesign;
use App\Models\DesignDesScience;
use App\Models\DesignDetail;
use App\Models\DesignService;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function getInfo()
    {
        $user = auth()->guard('api')->user();

        $info = DesignDesScience::whereUserId($user->id)
            ->select('description','experience','subject')
            ->whereUserId($user->id)
            ->first();

        $degree = $user->designDegree;

        $service = $user->designService;

        $degrees = DegreeDesign::get();
        $services = DesignService::get();


        return $this->sendResponse(['services' => $services,'degrees' => $degrees,'info' => $info,'degree' => $degree,'service' => $service], 'Data exited successfully');
    }

    public function storeInfo(Request $request)
    {
        DB::beginTransaction();
        try {

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

            $user = auth()->guard('api')->user();

            $user->designService()->sync($request->nameService);

            $user->designDegree()->sync($request->nameDegree);

            DesignDesScience::whereUserId($user->id)->update([
                'experience' => $request->experience,
                'subject' => $request->subject,
                'description' => $request->description
            ]);

            DB::commit();
            return $this->sendResponse([], 'Data exited successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }

    public function editPassword(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => 'required|string|min:8',
            'newRepeatPassword' => 'required|same:newPassword',
        ]);

        if ($v->fails()) {
            return $this->sendError('There is an error in the data', $v->errors());
        }

        $user = auth()->guard('api')->user();

        if (Auth::guard('api')->attempt(['password' => $request->oldPassword,'email' => $user->email])){
            $user->update(['password' => $request->newPassword]);
        }else{
            return $this->sendError('old password is Wrong', $v->errors());
        }
    }

}
