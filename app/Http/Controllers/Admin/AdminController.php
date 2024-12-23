<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('layouts.admin');
    }

    public function account()
    {
        return view('admin.account');
    }

    public function manageUsers()
    {
        return view('admin.users');
    }

    public function manageProducts()
    {
        return view('admin.products');
    }

    public function manageOrders()
    {
        return view('admin.orders');
    }
}
