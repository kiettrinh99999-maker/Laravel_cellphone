<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token=$request->input('token');
        $validToken=env('API_TOKEN');
        if ($token !== $validToken) {
            return response()->json([
                'error' => 'Token không hợp lệ hoặc thiếu.'
            ], 401);
        }
        return $next($request);
    }
}
