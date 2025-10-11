<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Thời gian hiện tại
        $date = now()->format('d/m/Y H:i:s');

        //Mẫu log
        $log = "--------------------------------------\n";
        $log .= "DateTime: {$date}\n";
        $log .= "URL: {$request->fullUrl()}\n";
        $log .= "Method: {$request->method()}\n";
        $log .= "IP: {$request->ip()}\n";

        // Đường dẫn file log
        $logFile = storage_path('logs/request.log');
        
        //Ghi vào file log mà không đè lên
        file_put_contents($logFile, $log, FILE_APPEND);
        return $next($request);
    }
}
