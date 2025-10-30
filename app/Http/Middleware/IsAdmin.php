<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
// use App\Http\Controllers\Admin\DashboardAdminController;
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra nếu không có session admin hoặc role không phải admin
        if (!session('admin') || session('admin')['role'] != 'admin') {
            return redirect()->route('formLogin');
        }
        
        return $next($request);
    }
}
