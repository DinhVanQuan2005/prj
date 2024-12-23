<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index()
    {
       return view('default.index');
    }

    /**
     * Trang thông tin tài khoản (chỉ dành cho người dùng đã đăng nhập).
     * @return \Illuminate\View\View
     */
    public function account()
    {
        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Trả về giao diện thông tin tài khoản
        return view('default.account', compact('user'));
    }
}
