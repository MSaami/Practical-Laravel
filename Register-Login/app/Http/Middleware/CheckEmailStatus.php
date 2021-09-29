<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmailStatus
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
        if ($request->user() && !$request->user()->hasVerifiedEmail()) {
            session()->flash('mustVerifyEmail', true);
        }
        return $next($request);
    }
}
