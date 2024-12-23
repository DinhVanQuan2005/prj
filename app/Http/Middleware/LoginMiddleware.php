<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware {
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::id() > 0) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
