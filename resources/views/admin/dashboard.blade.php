@extends('layouts.customer')

@section('content')
<div class="container mt-4">
    <h1>Chào mừng, {{ $user->username }}</h1>
    <p>Đây là trang chủ dành cho người quản trị.</p>
</div>
@endsection
