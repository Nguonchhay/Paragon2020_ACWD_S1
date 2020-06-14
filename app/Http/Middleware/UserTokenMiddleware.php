<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class UserTokenMiddleware
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
        $user = User::where('api_token', '=', $request->bearerToken())->first();
        if (empty($user)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
                'data' => []
            ], 401);
        }

        return $next($request);
    }
}
