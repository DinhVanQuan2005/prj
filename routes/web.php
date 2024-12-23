<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\Customer\CustomerController;
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
});
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(AuthenticateMiddleware::class);

Route::get('/login', function () {
    return view('auth.login');
})->name('login.form')->middleware(LoginMiddleware::class);


Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
// Nhóm route dành cho customer
Route::prefix('customer')->middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.home');
    //Thông tin tài khoản
    Route::get('/account', [CustomerController::class, 'account'])->name('customer.account');
    Route::get('/account/edit', [CustomerController::class, 'editAccount'])->name('customer.account.edit');
    Route::post('/account/update', [CustomerController::class, 'updateAccount'])->name('customer.account.update');
    Route::get('/account/password', [CustomerController::class, 'changePasswordForm'])->name('customer.password.change');
    Route::post('/account/password', [CustomerController::class, 'changePassword'])->name('customer.password.update');
    //Giỏ hàng của tôi 
    Route::get('/cart', [CustomerController::class, 'cart'])->name('customer.cart');
    //Xoá giỏ
    Route::post('/cart/remove/{index}', [CustomerController::class, 'removeCart'])->name('customer.cart.remove');
    // Đơn hàng
    Route::get('/orders', [CustomerController::class, 'orders'])->name('customer.orders');
    // Chi tiết đơn hàng
    Route::get('/orders/{order}', [CustomerController::class, 'orderDetail'])->name('customer.orders.detail');
});
//Nhóm route dành cho admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/account', [AdminController::class, 'account'])->name('admin.account');
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::get('/admin/products', [AdminController::class, 'manageProducts'])->name('admin.products');
    Route::get('/admin/orders', [AdminController::class, 'manageOrders'])->name('admin.orders');
    // Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout'); 
});
