<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertiserResource;
use App\Http\Resources\ClientResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\ComplementResource;
use App\Http\Resources\DesignResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\UserResource;
use App\Models\Advertiser;
use App\Models\Client;
use App\Models\Company;
use App\Models\Complement;
use App\Models\Country;
use App\Models\Designer;
use App\Models\State;
use App\Models\User;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use Message;

    public function companyRegister(Request $request)
    {

        DB::beginTransaction();

        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:8',
                'confirmtion' => 'required|same:password',
                'country'  => 'required|integer|exists:countries,id',
                'state'  => 'required|integer|exists:states,id',
                'phone' => 'required|string|unique:users',
                'phone_second' => 'present|different:phone',
                'nameCompany' => 'required|string|unique:complements',
                'location' => 'required|url|starts_with:https://www.google.com/maps',
                'code' => 'required'
            ]);

            if($v->fails()) {
                return $this->sendError('There is an error in the data',$v->errors());
            }

            $phone_second  = $request->phone_second != '' ? $request->code . $request->phone_second : null;


            // start create user
            $user =  User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "auth_id" => 2,
                'role_name'=> ['company'],
                "status" => 1,
                'phone' => $request->phone,
                "code" => $request->code
            ]);

            $user->complement()->create([
                'country_id' => $request->country,
                'state_id' => $request->state,
                'phone_second' => $phone_second,
                'nameCompany' => $request->nameCompany,
                'device' => ($request->device  == 1 ? 1:0)
            ]);

            $user->company()->create(['location' => $request->location]);

            $user->media()->create([
                'file_name' => 'img-04.jpg' ,
                'file_size' => 7664,
                'file_type' => 'png/image',
                'file_sort' => 1
            ]);


            $credentials = $request->only("email", "password");
            $token = Auth::guard('api')->attempt($credentials);

            DB::commit();
            return $this->sendResponse($this->respondWithToken($token),'Data exited successfully');

        }
        catch (\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');

        }

    }// end companyRegister

    public function designRegister(Request $request)
    {

        DB::beginTransaction();

        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8',
                'confirmtion' => 'required|same:password',
                'country'  => 'required|integer|exists:countries,id',
                'state'  => 'required|integer|exists:states,id',
                'phone' => 'required|string|unique:users',
                'gender' => 'required|in:male,female',
                'birth' => 'required|date|after:'. now()->subYears(50),
                'code' => 'required'
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
                "status" => 1,
                'phone' => $request->phone,
                "code" => $request->code
            ]);

            $user->complement()->create([
                'country_id' => $request->country,
                'state_id' => $request->state,
                'device' => ($request->device  == 1 ? 1:0)
            ]);

            $user->designer()->create([
                'gender' => $request->gender,
                'birth' => $request->birth
            ]);

            $user->media()->create([
                'file_name' => 'img-04.jpg' ,
                'file_size' => 7664,
                'file_type' => 'png/image',
                'file_sort' => 1
            ]);


            $credentials = $request->only("email", "password");
            $token = Auth::guard('api')->attempt($credentials);

            DB::commit();
            return $this->sendResponse($this->respondWithToken($token),'Data exited successfully');

        }catch(\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');

        }
    }// end designRegister

    public function advertiserRegister(Request $request)
    {

        DB::beginTransaction();

        try {


            // Validator request
            $v = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8',
                'confirmtion' => 'required|same:password',
                'country'  => 'required|integer|exists:countries,id',
                'state'  => 'required|integer|exists:states,id',
                'nameCompany' => 'required|string|unique:complements,nameCompany',
                'phone' => 'required|string|unique:users,phone',
                'code' => 'required'
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
                "status" => 1,
                'phone' => $request->phone,
                "code" => $request->code
            ]);

            $user->complement()->create([
                'country_id' => $request->country,
                'state_id' => $request->state,
                'nameCompany' => $request->nameCompany,
                'device' => ($request->device  == 1 ? 1:0)
            ]);

            Advertiser::create([
                'user_id' => $user->id
            ]);

            $user->media()->create([
                'file_name' => 'img-04.jpg' ,
                'file_size' => 7664,
                'file_type' => 'png/image',
                'file_sort' => 1
            ]);


            $credentials = $request->only("email", "password");
            $token = Auth::guard('api')->attempt($credentials);

            DB::commit();
            return $this->sendResponse($this->respondWithToken($token),'Data exited successfully');

        }catch(\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    }// end advertiserRegister

    public function clientRegister(Request $request)
    {

        DB::beginTransaction();

        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8',
                'confirmtion' => 'required|same:password',
                'country'  => 'required|integer|exists:countries,id',
                'state'  => 'required|integer|exists:states,id',
                'phone' => 'required|string|unique:users,phone',
                'code' => 'required'
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            // start create user
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "auth_id" => 3,
                'role_name' => ['client'],
                "status" => 1,
                'phone' => $request->phone,
                "code" => $request->code
            ]);

            $user->complement()->create([
                'country_id' => $request->country,
                'state_id' => $request->state,
                'device' => ($request->device  == 1 ? 1:0)
            ]);

            Client::create([
                'user_id' => $user->id
            ]);

            $user->media()->create([
                'file_name' => 'img-04.jpg' ,
                'file_size' => 7664,
                'file_type' => 'png/image',
                'file_sort' => 1
            ]);

            $credentials = $request->only("email", "password");
            $token = Auth::guard('api')->attempt($credentials);

            DB::commit();
            return $this->sendResponse($this->respondWithToken($token),'Data exited successfully');

        }catch(\Exception $e){
            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    }// end advertiserRegister

    public function country()
    {
        $country = Country::with('media:file_name,mediable_id')->whereStatus(true)->get();
        return $this->sendResponse(['country' => $country],'Data exited successfully');
    }

    public function state($id)
    {
        $state = State::whereCountryId($id)->whereStatus(true)->get();
        return $this->sendResponse(['state' => StateResource::collection($state)],'Data exited successfully');
    }

    // create token (company,desgin,advertiser,client)
    protected function respondWithToken($token)
    {
        $user = auth()->guard('api')->user();
        $complement = Complement::whereUserId($user->id)->first();

        if(collect($user->role_name)->toArray()[0] == 'company'){
            $partner = new CompanyResource(Company::whereUserId($user->id)->first());
        }elseif (collect($user->role_name)->toArray()[0] == 'design'){
            $partner = new DesignResource(Designer::whereUserId($user->id)->first());
        }elseif (collect($user->role_name)->toArray()[0] == 'advertiser'){
            $partner = new AdvertiserResource(Advertiser::whereUserId($user->id)->first());
        }elseif (collect($user->role_name)->toArray()[0] == 'client'){
            $partner = new ClientResource(Client::whereUserId($user->id)->first());
        }

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => new UserResource($user),
            'complement'=> new ComplementResource($complement),
            'partner'=> $partner
        ];

    }//**********end respondWithToken************/


}
