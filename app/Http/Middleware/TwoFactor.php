<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TwoFactor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->code)
        {
            return to_route('verify.index');
        }

        if(Auth::user()->expire_at <= date('Y-m-d H:i:s', strtotime(now())))
        {
            Auth::logout();
            return to_route('login');
        }

        return $next($request);
    }
}
