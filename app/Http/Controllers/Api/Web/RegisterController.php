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

//            return response()->json($request->all());

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
                'nameCompany' => 'required|string|unique:complements',
                'location' => 'required|url'
            ]);

            if($v->fails()) {
                return $this->sendError('There is an error in the data',$v->errors());
            }

            $phone_second  = $request->phone_second != '' ?
                $request->code . $request->phone_second : null;

            if($request->phone_second != ''){
                $phone_second = $request->code . $request->phone_second;
            }

            // start create user
            $user =  User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "auth_id" => 2,
                'role_name'=> ['company'],
                "status" => 1,
            ]);

            $user->complement()->create([
                'country_id' => $request->country,
                'state_id' => $request->state,
                'phone' => $request->code . $request->phone,
                'phone_second' => $phone_second,
                'nameCompany' => $request->nameCompany,
            ]);

            $user->company()->create(['location' => $request->location]);

            $user->media()->create([
                'file_name' => 'img-04.jpg' ,
                'file_size' => 7664,
                'file_type' => 'png/image',
                'file_sort' => 1
            ]);

            DB::commit();

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
                "status" => 1,
            ]);

            $user->complement()->create([
                'country_id' => $request->country,
                'state_id' => $request->state,
                'phone' => $request->code . $request->phone
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
                "status" => 1,
            ]);

            $user->complement()->create([
                'country_id' => $request->country,
                'state_id' => $request->state,
                'phone' => $request->code . $request->phone,
                'nameCompany' => $request->nameCompany
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

    // create token (company,desgin,advertiser)
    protected function respondWithToken($token)
    {
        $user = auth()->guard('api')->user();
        $complement = Complement::whereUserId($user->id)->first();

        if($user->role_name[0] == 'company'){
            $partner = new CompanyResource(Company::whereUserId($user->id)->first());
        }elseif ($user->role_name[0] == 'design'){
            $partner = new DesignResource(Designer::whereUserId($user->id)->first());
        }elseif ($user->role_name[0] == 'advertiser'){
            $partner = new AdvertiserResource(Advertiser::whereUserId($user->id)->first());
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
