<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 18/02/17
 * Time: 12:12 AM
 */

namespace SystemInvoices\Http\Controllers\Auth;

use Illuminate\Http\Request;
use SystemInvoices\Http\Controllers\Controller;
use Socialite;
use SystemInvoices\Services\SocialAccountService;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider(Request $request, $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
        $user = $service->createOrGetUser(Socialite::driver($provider)->user(), $provider);
        \Auth::login($user);
        return redirect('/home');
    }
}