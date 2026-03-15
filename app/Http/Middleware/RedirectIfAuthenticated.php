<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;

class RedirectIfAuthenticated extends Middleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, \Closure $next, ...$guards)
    {
        return $next($request);
    }
}
