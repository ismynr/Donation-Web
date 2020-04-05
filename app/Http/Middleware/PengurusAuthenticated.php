<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class PengurusAuthenticated
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
        // return $next($request);
        if( Auth::check() )
        {
            // if user admin take him to his dashboard
            if ( Auth::user()->isDonatur() ) {
                 return redirect('/donatur');
            }

            // allow user to proceed with request
            else if ( Auth::user()->isPengurus() ) {
                 return $next($request);
            }
        }

        abort(404);  // for other user throw 404 error
    }
}
