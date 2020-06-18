<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function authenticated(Request $request, $user)
    {
        activity()->log('login');

        // to admin dashboard
        if($user->isPengurus()) {
            return redirect(route('pengurus.dashboard'));
        }

        // to user dashboard
        else if($user->isDonatur()) {
            return redirect(route('donatur.dashboard'));
        }

        // user yang belum punya role
        else if($user->isUser()) {
            return redirect(route('user.dashboard'));
        }

        // user yang belum punya role
        else if($user->isAdmin()) {
            return redirect(route('admin.dashboard'));
        }

        abort(404);
    }

    public function logout(Request $request){
        activity()->log('logout');
        
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/');
    }
}
