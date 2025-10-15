<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // middleware se ghi log vao storage/logs/request.log
        // $middleware->append(\App\Http\Middleware\LogRequest::class);
        // $middleware->alias([
        //     'IsAdmin' => \App\Http\Middleware\IsAdmin::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
