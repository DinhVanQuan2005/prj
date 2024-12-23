@extends('layouts.customer')

@section('content')
<div class="container mt-4">
    <h1 text-align=center>Thông tin tài khoản</h1>
    <p><strong>Họ tên:</strong> {{ $user->username }}</p>
    <p><strong>Số điện thoại:</strong> {{ $user->phone_number }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Địa chỉ:</strong> {{ $user->address }}</p>
</div>
@endsection
