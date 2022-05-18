<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertiserResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\ComplementResource;
use App\Http\Resources\DesignResource;
use App\Http\Resources\UserResource;
use App\Models\Advertiser;
use App\Models\Company;
use App\Models\Complement;
use App\Models\Designer;
use App\Models\Media;
use App\Models\User;
use App\Traits\Message;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as RulesPassword;

class AuthController extends Controller
{
    use Message;

    // login user & create token
    public function login(Request $request)
    {
        try{

            // Validator request
            $v = Validator::make($request->all(),[
                'email' => 'required|string|email',
                'password' => 'required|string',
                'remember_me' => 'boolean'
            ]);

            if($v->fails()) {
                return $this->sendError(trans('general.forget'),$v->errors(),401);
            }
            //start access token
            $credentials = $request->only("email", "password");

            if ($token = Auth::guard('api')->attempt($credentials)) {

                $user = Auth::guard('api')->user();

                if( $user->auth_id == 2){

                    if($user->status  == 1){
                        return  $this->sendResponse($this->respondWithToken($token),'Data exited successfully');
                    }else {
                        return $this->sendError(trans('general.approved'));
                    }

                }else{
                    return $this->sendError(trans('general.forget'));
                }

            }else{

                return $this->sendError(trans('general.forget'));
            }

        }catch (\Exception $e){
            return $this->sendError(trans('general.forget'));
        }
    }//**********end login************//

    public function user()
    {
        $user = auth()->guard('api')->user();

        return  $this->sendResponse(['user' => new UserResource($user)],'Data exited successfully');

    }

    public function complement()
    {

        $user = auth()->guard('api')->user();
        $complement = Complement::whereUserId($user->id)->first();

        return  $this->sendResponse(['complement' => $complement],'Data exited successfully');

    }

    public function partner()
    {
        $user = auth()->guard('api')->user();

        if($user->role_name[0] == 'company'){
            $partner = new CompanyResource(Company::whereUserId($user->id)->first());
        }elseif ($user->role_name[0] == 'design'){
            $partner = new DesignResource(Designer::whereUserId($user->id)->first());
        }elseif ($user->role_name[0] == 'advertiser'){
            $partner = new AdvertiserResource(Advertiser::whereUserId($user->id)->first());
        }

        return  $this->sendResponse(['partner' => $partner],'Data exited successfully');

    }

    //start forgotPassword
    public function forgotPassword(Request $request)
    {
        try {

            // Validator request
            $v = Validator::make($request->all(),[
                'email' => 'required|string|email',
            ]);

            if($v->fails()) {
                return $this->sendError('Your Email is wrong',$v->errors(),401);
            }

            $status = Password::sendResetLink(
                $request->only('email')
            );

            if ($status == Password::RESET_LINK_SENT) {

                $user = User::whereEmail($request->only('email'))->first();

                Auth::guard('api')->attempt(['email'=>$user->email,'password' =>$user->password ]);

                return  $this->sendResponse([],'we have emailed your password reset link!');
            }

            return $this->sendError('Your Email is wrong',$v->errors(),401);

        }catch(\Exception $e){

            return $this->sendError('An error occurred in the system',[],401);

        }
    }//**********end forgotPassword************//

    //start reset
    public function reset(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(),[
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required','min:8','confirmed',RulesPassword::defaults()],
        ]);

        if($v->fails()) {
            return $this->sendError('Your Email is wrong',$v->errors(),401);
        }


        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => $request->password,
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return  $this->sendResponse([],'Password reset successfully!');
        }

        return $this->sendError('An error occurred in the system',[],401);


    }//**********end reset************//

    //start sendVerificationEmail
    public function sendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return  $this->sendResponse([],'Already Verified');
        }

        $request->user()->sendEmailVerificationNotification();

        return  $this->sendResponse([],'verification-link-sent');

    }//end sendVerificationEmail

    //start verify
    public function verify(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {

            return  $this->sendResponse([],'Email already verified');

        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return  $this->sendResponse([],'Email has been verified');

    }//end verify

    public function changeImage(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'file' => 'required|file|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=50px,min_height=50,max_width=500,max_height=500'
        ]);

        if ($v->fails()) {
            return $this->sendError('There is an error in the data', $v->errors());
        }

        $user = auth()->guard('api')->user();

        if($user->media && $user->media->file_name != 'img-04.jpg'){
            unlink('web/img/user/'.$user->id.'/'. $user->media->file_name);
            $user->media->delete();

            $file = $request->file;
            $file_size = $file->getSize();
            $file_type = $file->getMimeType();
            $image = time() .'.'. $file->getClientOriginalName();

            // picture move
            $file->storeAs($user->id, $image,'user');

            User::find($user->id)->media()->create([
                'file_name' => $image ,
                'file_size' => $file_size,
                'file_type' => $file_type,
                'file_sort' => 1
            ]);

        }elseif ($user->media->file_name == 'img-04.jpg'){

            $file = $request->file;
            $file_size = $file->getSize();
            $file_type = $file->getMimeType();
            $image = time() .'.'. $file->getClientOriginalName();

            // picture move
            $file->storeAs($user->id, $image,'user');

            Media::find($user->media->id)->update([
                'file_name' => $image ,
                'file_size' => $file_size,
                'file_type' => $file_type,
                'file_sort' => 1
            ]);

        }

        return $this->sendResponse([],'Data exited successfully');

    }//end changeImage

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
