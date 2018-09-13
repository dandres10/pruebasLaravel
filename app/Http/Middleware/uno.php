<?php

namespace App\Http\Middleware;

use Closure;


use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;

class uno
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
        if (Auth::guard($guard->guest())) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.',401);
            }else{
                return redirect()->guest('login');
            }
        }

        return $next($request);
    }
}
