<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware {
    
    public function handle(Request $request, Closure $next): Response
    {
      if(Auth::id()==null){
        return redirect()->route('login.form')->with('error', 'Vui lòng đăng nhập');
      }
      return $next($request);
    }
}
