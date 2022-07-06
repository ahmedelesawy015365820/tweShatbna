<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ComplementResource;
use App\Http\Resources\UserResource;
use App\Models\Client;
use App\Models\Complement;
use App\Traits\SocialAccountService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAccountController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(SocialAccountService $profileService, $provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->to('login');
        }

        $authUser = $profileService->findOrCreate($user, $provider);

        return $this->sendResponse($this->respondWithToken($authUser),'Data exited successfully');

    }

    protected function respondWithToken($token)
    {
        $user = auth()->guard('api')->user();
        $complement = Complement::whereUserId($user->id)->first();
        $partner = new ClientResource(Client::whereUserId($user->id)->first());

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => new UserResource($user),
            'complement'=> new ComplementResource($complement),
            'partner'=> $partner
        ];

    }//**********end respondWithToken************/




}
