<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;

class CustomerController extends Controller {
    public function index() {
        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();
        // Trả về view trang chủ customer
        return view('layouts.customer', compact('user'));
    }
    public function account() {
        $user = Auth::user();
        return view('customer.account', compact('user'));
    }
    
    public function editAccount()
    {
        $user = Auth::user();
        return view('customer.edit_account', compact('user'));
    }
    public function updateAccount(Request $request)
    {
        $user = Auth::user();

        // Validate dữ liệu đầu vào
        $request->validate([
            'username' => 'required|string|max:50',
            'phone_number' => 'required|int|max:10',
            'address' => 'required|string|max:250',
        ]);

        // Cập nhật thông tin người dùng
        $user->update($request->only(['username', 'phone_number', 'address']));

        return redirect()->route('customer.account')->with('success', 'Thông tin tài khoản đã được cập nhật!');
    }
    public function changePasswordForm()
    {
        return view('customer.change_password');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Xác thực mật khẩu cũ
        if (!Auth::attempt(['email' => Auth::user()->email, 'password' => $request->current_password])) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
        }

        // Cập nhật mật khẩu mới
        $user = Auth::user();
        $user->update(['password' => bcrypt($request->password)]);

        return redirect()->route('customer.account')->with('success', 'Mật khẩu đã được thay đổi!');
    }
    public function cart()
    {
        $userId = session()->get('idUser'); // Lấy ID người dùng từ session  
        $cart = Cart::where('idUser', $userId)->get(); // Truy vấn giỏ hàng từ database  
        return view('customer.cart', compact('cart'));
    }
    public function removeCart($index) {
    $cart = session()->get('cart', []);
    if (isset($cart[$index])) {
        unset($cart[$index]);
    }
    // Cập nhật lại giỏ hàng vào session
    session()->put('cart', $cart);
        foreach ($cart as $item) {  
    // Giả sử bạn có một chỉ định id cho từng sản phẩm trong giỏ hàng  
    $cartItem = Cart::updateOrCreate(  
        ['idProduct' => $item['id'], 'idUser' => Auth::id()],  
        ['quantity' => $item['quantity'], 'price' => $item['price']]  
    );    
    return redirect()->route('customer.cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }
    public function orders()
    {
        $orders = Auth::user()->orders; 
        return view('customer.orders', compact('orders'));
    }
    public function orderDetail(Order $order)
    {
        // Xác minh quyền truy cập đơn hàng
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền truy cập đơn hàng này.');
        }

        return view('customer.order_detail', compact('order'));
    }
}
