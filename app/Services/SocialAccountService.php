<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 18/02/17
 * Time: 01:00 AM
 */

namespace SystemInvoices\Services;

use SystemInvoices\User;
use SystemInvoices\Models\SocialAccount;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser, $provider = 'facebook')
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => bcrypt(str_random()),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}