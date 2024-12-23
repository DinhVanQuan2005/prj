@extends('layouts.customer')

@section('content')
<div class="container mt-4">
    <h1>Giỏ hàng của tôi</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng cộng</th>
                <th>Xoá</th>
            </tr>
        </thead>
        <tbody>
            @if(count($cart) > 0)
                @foreach($cart as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ number_format($item['price'], 0, ',', '.') }} đ</td>
                    <td>{{ number_format($item['quantity'] * $item['price'], 0, ',', '.') }} đ</td>
                    <td>
                        <form action="{{ route('customer.cart.remove', $index) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center">Giỏ hàng của bạn đang trống.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
