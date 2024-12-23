@extends('layouts.customer')

@section('content')
<div class="container mt-4">
    <h1 text-align=center>Thay đổi mật khẩu</h1>
    <form method="POST" action="{{ route('customer.password.update') }}">
        @csrf
        <div class="mb-3">
            <label for="current_password">Mật khẩu hiện tại:</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password">Mật khẩu mới:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation">Nhập lại mật khẩu mới:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
