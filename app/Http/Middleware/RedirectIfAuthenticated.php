<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        if (Auth::guard($guard)->check())
        {
            if(Auth::user()->role=='super_admin')
            {
                return redirect('/main');
            }
            if(Auth::user()->role=='admin')
            {
                return redirect('/main');
            }
            if(Auth::user()->role=='manager')
            {
                return redirect('/main');
            }
            if(Auth::user()->role=='supervisor')
            {
                return redirect('/main');
            }
            if(Auth::user()->role=='operator')
            {
                return redirect('/main');
            }
            elseif (Auth::user()->role=='customer')
            {
                return redirect('/jotnoshop');
            }
            elseif (Auth::user()->role=='retailer')
            {
                return redirect('/jotnoshop');
            }
            elseif (Auth::user()->role=='wholesaler')
            {
                return redirect('/jotnoshop');
            }
            elseif (Auth::user()->role=='dealer')
            {
                return redirect('/jotnoshop');
            }
        }

        return $next($request);
    }
}
