<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminAuthenticated
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
            if ( Auth::user()->isPengurus() ) {
                return redirect('/pengurus');
            }

            // allow admin to proceed with request
            else if ( Auth::user()->isDonatur() ) {
                 return redirect('/donatur');
            }

            else if ( Auth::user()->isUser() ) {
                 return redirect('/user');
            }

            else if ( Auth::user()->isAdmin() ) {
                 return $next($request);
            }
        }

        abort(404);  // for other user throw 404 error
    }
}
