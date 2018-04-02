<?php
/**=======================================
 * @author ikodota <ikodota@gmail.com>
 * @copyright (c) 2016, ikodota
 * @datetime 2016-12-11 17:37
 *==================================
 * =====*/
namespace Ikodota\Yeoman\Controllers\Auth;

use Ikodota\Yeoman\Controllers\Controller;
use Illuminate\Support\Facades\Socialite as Socialite;


class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        // $user->token;
    }
}