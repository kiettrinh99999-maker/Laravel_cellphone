<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use \Symfony\Component\HttpKernel\Exception\HttpException;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\CheckToken;

use Illuminate\Http\Request;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        // middleware: [
        //     // Đăng ký middleware ở đây
        //     'is.admin'=> \App\Http\Middleware\IsAdmin::class,
        // ],
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
        'checkToken'=>CheckToken::class,
        'isAdmin' => IsAdmin::class    
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function(HttpException $exception, Request $request){
            if ($exception->getStatusCode() == 404) {
            return response()->view("errorPage");
        }
        });
    })->create();
