<?php

namespace App\Http\Middleware;

use Closure;

class ChekAge
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
        Log::info('Request from ' . $request->ip() . ' within browser ' . $request->userAgent());

        return $next($request);
    }
}
