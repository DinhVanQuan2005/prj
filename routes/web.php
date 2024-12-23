<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DefaultController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route cho phần "default layout" (không có giỏ hàng)
Route::group(['middleware' => [AuthenticateMiddleware::class]], function () {
    // Trang chủ mặc định
    Route::get('/', [DefaultController::class, 'index'])->name('default.home');
    // Trang thông tin tài khoản
    Route::get('/account', [DefaultController::class, 'account'])->name('default.account');
});
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(AuthenticateMiddleware::class);

Route::get('/login', function () {
    return view('auth.login');
})->name('login.form')->middleware(LoginMiddleware::class);


Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');

