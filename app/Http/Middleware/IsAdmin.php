<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard=null)
    {
        // if (auth()->check() && $request->user()->admin() == 0) {
        //     return redirect()->guest('home');
        // }
        // return $next($request);


        if (Auth::guard($guard)->check() && Auth::user()->admin == 0) {
            return redirect()->route('user');
        }
        return $next($request);
    }
}
