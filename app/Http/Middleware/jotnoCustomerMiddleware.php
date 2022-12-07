<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class jotnoCustomerMiddleware
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
        if(Auth::check() && Auth::user()->role=='customer')
        {
            return $next($request);
        }
        if(Auth::check() && Auth::user()->role=='retailer')
        {
            return $next($request);
        }
        if(Auth::check() && Auth::user()->role=='wholesaler')
        {
            return $next($request);
        }
        if(Auth::check() && Auth::user()->role=='dealer')
        {
            return $next($request);
        }
        else
        {
            return redirect()->back();
        }
    }
}
