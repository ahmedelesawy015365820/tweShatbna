<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertiserResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\ComplementResource;
use App\Http\Resources\DesignResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\UserResource;
use App\Models\Advertiser;
use App\Models\Company;
use App\Models\Complement;
use App\Models\Country;
use App\Models\Designer;
use App\Models\State;
use App\Models\User;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use Message;

    public function companyRegister(Request $request)
    {

        try {

            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8',
                'confirmtion' => 'required|same:password',
                'country'  => 'required|integer|exists:countries,id',
                'state'  => 'required|integer|exists:states,id',
                'phone' => 'required|string|unique:complements',
                'phone_second' => 'present',
                'nameCompany' => 'required|string|unique:companies,nameCompany',
                'location' => 'required|url'
            ]);

            if($v->fails()) {
                return $this->sendError('There is an error in the data',$v->errors());
            }


            // start create user
            $user =  User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "auth_id" => 2,
                'role_name'=> ['company'],
                "status" => 0,
            ]);

            $user->complement()->create([
                'country_id' => $request->country,
                'state_id' => $request->state,
                'phone' => $request->phone,
                'phone_second' => $request->phone_second,
                "sendEmail" => $request->sendEmail
            ]);

            $user->company()->create([
                'nameCompany' => $request->nameCompany,
                'location' => $request->location
            ]);

            DB::commit();
            if($user){

                //start access token
                $credentials = $request->only("email", "password");
                $token = Auth::guard('api')->attempt($credentials);

                return $this->sendResponse($this->respondWithToken($token),'Data exited successfully');
            }else{
                return $this->sendError('An error occurred in the system');
            }

        }
        catch (\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');

        }

    }// end companyRegister



    public function designRegister(Request $request)
    {

        try {

            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8',
                'confirmtion' => 'required|same:password',
                'country'  => 'required|integer|exists:countries,id',
                'state'  => 'required|integer|exists:states,id',
                'phone' => 'required|string|unique:complements',
                'gender' => 'required|in:male,female',
                'birth' => 'required|date'
            ]);

            if($v->fails()) {
                return $this->sendError('There is an error in the data',$v->errors());
            }


            // start create user
            $user =  User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "auth_id" => 2,
                'role_name'=> ['design'],
                "status" => 0,
            ]);

            $user->complement()->create([
                'country_id' => $request->country,
                'state_id' => $request->state,
                'phone' => $request->phone
            ]);

            $user->designer()->create([
                'gender' => $request->gender,
                'birth' => $request->birth
            ]);

            DB::commit();
            if($user){
                return $this->sendResponse([],'Data exited successfully');
            }else{
                return $this->sendError('An error occurred in the system');
            }

        }catch(\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');

        }
    }// end designRegister



    public function advertiserRegister(Request $request)
    {

        try {

            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8',
                'confirmtion' => 'required|same:password',
                'country'  => 'required|integer|exists:countries,id',
                'state'  => 'required|integer|exists:states,id',
                'nameCompany' => 'required|string|unique:complements,nameCompany',
                'phone' => 'required|string|unique:complements,phone',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            // start create user
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "auth_id" => 2,
                'role_name' => ['advertiser'],
                "status" => 0,
            ]);

            $user->complement()->create([
                'country_id' => $request->country,
                'state_id' => $request->state,
                'phone' => $request->phone,
                'nameCompany' => $request->nameCompany
            ]);

            Advertiser::create([
                'user_id' => $user->id
            ]);

            DB::commit();
            if($user){
                return $this->sendResponse([],'Data exited successfully');
            }else{
                return $this->sendError('An error occurred in the system');
            }


        }catch(\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');

        }

    }// end advertiserRegister

    public function country()
    {
        $country = Country::with('media:file_name,mediable_id')->get();
        return $this->sendResponse(['country' => $country],'Data exited successfully');
    }

    public function state($id)
    {
        $state = State::whereCountryId($id)->get();
        return $this->sendResponse(['state' => StateResource::collection($state)],'Data exited successfully');
    }

}
