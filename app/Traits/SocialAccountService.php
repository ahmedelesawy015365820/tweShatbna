<?php

namespace App\Traits;

use App\Models\Client;
use App\Models\Complement;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService {

    public function findOrCreate(ProviderUser $providerUser, $provider) {

        $account = SocialAccount::where('provider_id', $providerUser->getId())->where('provider_name', $provider)->first();

        if ($account) {

            $authUser = Auth::guard('api')->attempt(['email'=>$account->user->email,'password' =>$account->user->password ]);

            return $authUser;
        } else {
            $user = User::where('email', $providerUser->getEmail())->first();
            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    "auth_id" => 2,
                    'role_name' => ['client'],
                    "status" => 1
                ]);

                Complement::create([
                    'user_id' => $user->id
                ]);

                Client::create([
                    'user_id' => $user->id
                ]);

            }

            $user->accounts()->create([
                'provider_name' => $provider,
                'provider_id' => $providerUser->getId()
            ]);

             $authUser = Auth::guard('api')->attempt(['email'=>$user->email,'password' =>$user->password ]);

            return $authUser;

        }

    }
}
