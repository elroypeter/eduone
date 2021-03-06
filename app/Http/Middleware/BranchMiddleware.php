<?php

namespace App\Http\Middleware;

use Closure;

class BranchMiddleware
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
        if (\Auth::check() && null === session('branch')) {
            \App\Branch::switch();

            return redirect('/');
        }

        return $next($request);
    }
}
