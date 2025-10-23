<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $user = session('user');// Lấy mảng user từ session
        if (!$user || $user['role'] !== 'admin') {
            // Nếu không phải admin thì redirect về login
            return redirect()->route('loginAdmin');
        } 
        return $next($request);
    }
}
