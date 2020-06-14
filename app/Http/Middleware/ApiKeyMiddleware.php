<?php

namespace App\Http\Middleware;

use Closure;

class ApiKeyMiddleware
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
        if ($request->bearerToken() !== config('setting.api_key')) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
                'data' => []
            ], 401);
        }

        return $next($request);
    }
}
