@extends('client/layout')
@section('title', 'Đơn Hàng')
@section('content')
<div class="container">
    <h2>Danh sách đơn hàng</h2>
    @if ($order->isEmpty())
        <p>Không có đơn hàng nào.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Người đặt</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Tên sản phẩm</th>
                    <th>Màu sắc</th>
                    <th>Dung lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $orderItem)
                    <tr>
                        <td>{{ $orderItem->order_id }}</td>
                        <td>{{ $orderItem->full_name }}</td>
                        <td>{{ $orderItem->phone }}</td>
                        <td>{{ $orderItem->address }}</td>
                        <td>{{ $orderItem->name }}</td>
                        <td>{{ $orderItem->color }}</td>
                        <td>{{ $orderItem->storage }}</td>
                        <td>{{ number_format($orderItem->price, 0, ',', '.') }} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Phân trang -->
        <div class="d-flex justify-content-center">
            {{ $order->links() }}
        </div>
    @endif
</div>
@endsection
