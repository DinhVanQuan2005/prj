@extends('layouts.customer')

@section('content')
<div class="container mt-4">
    <h1>Giỏ hàng của tôi</h1>
    <form id="cartForm" method="POST" action="{{ route('customer.cart.checkout') }}">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll" /></th> 
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
                        <td>
                            <!-- Checkbox chọn sản phẩm -->
                            <input type="checkbox" name="selected[]" class="selectProduct" data-price="{{ $item['quantity'] * $item['price'] }}" value="{{ $index }}" />
                        </td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($item['price'], 0, ',', '.') }} đ</td>
                        <td>{{ number_format($item['quantity'] * $item['price'], 0, ',', '.') }} đ</td>
                        <td>
                            <form method="POST" action="{{ route('customer.cart.remove', $index) }}">
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
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <input type="checkbox" id="selectAllFooter" />
                <label for="selectAllFooter">Chọn tất cả</label>
            </div>
            <div>
                <span id="totalPrice">Tổng tiền: 0 đ</span>
                <button type="submit" id="checkoutButton" class="btn btn-primary" disabled>
                    Mua hàng
                </button>
            </div>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectAll = document.getElementById('selectAll');
        const selectAllFooter = document.getElementById('selectAllFooter');
        const checkboxes = document.querySelectorAll('.selectProduct');
        const totalPriceElement = document.getElementById('totalPrice');
        const checkoutButton = document.getElementById('checkoutButton');

        // Hàm tính tổng tiền và số lượng sản phẩm đã chọn
        function updateSummary() {
            let total = 0;
            let selectedCount = 0;

            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    selectedCount++;
                    total += parseFloat(checkbox.getAttribute('data-price'));
                }
            });

            totalPriceElement.textContent = `Tổng tiền: ${total.toLocaleString('vi-VN')} đ`;
            checkoutButton.textContent = `Mua hàng (${selectedCount})`;
            checkoutButton.disabled = selectedCount === 0; // Vô hiệu hóa nút nếu không có sản phẩm nào được chọn
        }

        // Chọn tất cả sản phẩm
        function toggleSelectAll(isChecked) {
            checkboxes.forEach((checkbox) => {
                checkbox.checked = isChecked;
            });
            updateSummary();
        }

        // Gắn sự kiện cho checkbox "Chọn tất cả"
        selectAll.addEventListener('change', function () {
            toggleSelectAll(this.checked);
            selectAllFooter.checked = this.checked;
        });

        // Gắn sự kiện cho checkbox "Chọn tất cả" ở footer
        selectAllFooter.addEventListener('change', function () {
            toggleSelectAll(this.checked);
            selectAll.checked = this.checked;
        });

        // Gắn sự kiện cho từng checkbox sản phẩm
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', updateSummary);
        });
    });
</script>
@endsection
