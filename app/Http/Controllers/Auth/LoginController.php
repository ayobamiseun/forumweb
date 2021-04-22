<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        redirectPath as laravelRedirectPath;
        logout as laravelLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create Flash message after logging in
     */
    public function redirectPath()
    {
        /**
         * If there's a defined redirectTo, use it
         */
        if (!empty(request()->input('redirectTo'))) {
            $this->redirectTo = request()->input('redirectTo');
        }

        $user = Auth::user();
        session()->flash('message', 'Welcome back <b>' . $user->user_name . '</b>');

        return $this->laravelRedirectPath();
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        return $this->laravelLogout($request)->with('message', 'See you soon <b>' . $user->user_name . '</b>!');;
    }
}
