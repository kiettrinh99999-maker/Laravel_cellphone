<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateContact
{
    public function handle(Request $request, Closure $next)
    {
        $request->validate([
            'phone'   => 'required',
            'email'   => 'required|email',
            'subject' => 'required',
            'content' => 'required',
        ]);

        return $next($request);
    }
}
