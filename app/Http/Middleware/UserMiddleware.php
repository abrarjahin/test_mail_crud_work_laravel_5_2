<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request for users routes
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check())
        {
            if(strcmp( "user" , Auth::user()->user_type ) != 0 )
                return redirect('home');
            else
                return $next($request);
        }
        else
        {
            return redirect('login');
        }
    }
}
