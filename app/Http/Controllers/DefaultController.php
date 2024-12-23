<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller {
    public function index() {
       return view('layouts.app');
    }

    public function account() {
        $user = Auth::user();
        return view('default.account', compact('user'));
    }
}
