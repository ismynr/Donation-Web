<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class UserAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( Auth::check() )
        {
            // if user admin take him to his dashboard
            if ( Auth::user()->isPengurus() ) {
                return redirect('/pengurus');
            }

            // allow admin to proceed with request
            else if ( Auth::user()->isDonatur() ) {
                 return redirect('/donatur');
            }

            else if ( Auth::user()->isUser() ) {
                 return $next($request);
            }
        }

        abort(404);  // for other user throw 404 error
    }
}
