<?php

// app/Http/Middleware/UserMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->isUser()) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
