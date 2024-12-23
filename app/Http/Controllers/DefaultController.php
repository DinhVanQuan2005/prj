<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller {
    public function index() {
       return view('layouts.app');
    }
}
