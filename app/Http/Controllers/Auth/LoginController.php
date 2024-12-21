<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
       $credentials=[
              'email'=>$request->input('email'),
              'password'=>$request->input('password')
       ];
       if(Auth::attempt($credentials)){
            return redirect()->route('home')->with('success','Đăng nhập thành công');
       }
       return redirect()->route('login.form')->with('error','Email hoặc mật khẩu không đúng');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form');
    }
}
