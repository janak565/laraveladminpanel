<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        //echo $guard;
        if($guard=='admin'){
            if (Auth::guard($guard)->check()) {
                return redirect()->route('admin.auth.login');
            }    
        }else{
            if (Auth::guard($guard)->check()) {
                return redirect()->route('home');
            }
        }
        

        return $next($request);
    }
}
