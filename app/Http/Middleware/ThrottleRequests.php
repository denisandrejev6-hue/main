<?php

namespace App\Http\Middleware;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Routing\Middleware\ThrottleRequests as Middleware;

class ThrottleRequests extends Middleware
{
    /**
     * Resolve the appropriate limits for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Cache\RateLimiting\Limit|array
     */
    protected function resolveRequestSignature($request)
    {
        return $request->user()?->id ?? $request->ip();
    }
}
