@extends('client/layout')
@section('title', 'Lịch Sử Đơn Hàng')
@section('content')

<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-gradient-primary text-white py-3">
                        <h4 class="mb-0 fw-bold"><i class="fas fa-shopping-bag me-2"></i>Lịch Sử Đơn Hàng</h4>
                    </div>
                    <div class="card-body p-4">
                        @if ($order->isEmpty())
                            <div class="text-center py-5">
                                <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                                <h5 class="text-muted">Bạn chưa có đơn hàng nào.</h5>
                                {{-- <a href="{{ route('products') }}" class="btn btn-primary mt-3"> --}}
                                    <i class="fas fa-shopping-cart me-2"></i>Mua sắm ngay
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Sản phẩm</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $orderItem)
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">#{{ $orderItem->order_id }}</span>
                                                </td>
                                                <td>{{ $orderItem->created_at->format('d/m/Y H:i') }}</td>
                                                <td>
                                                    <span class="d-block">{{ $orderItem->name }}</span>
                                                    <small class="text-muted">
                                                        {{ $orderItem->color }} - {{ $orderItem->storage }}
                                                    </small>
                                                </td>
                                                <td>{{ number_format($orderItem->price, 0, ',', '.') }} VND</td>
                                                <td>
                                                    <span class="badge bg-success">Đã giao</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderModal{{ $orderItem->order_id }}">
                                                        <i class="fas fa-eye me-1"></i>Chi tiết
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal for order details -->
                                            <div class="modal fade" id="orderModal{{ $orderItem->order_id }}" tabindex="-1" aria-labelledby="orderModalLabel{{ $orderItem->order_id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="orderModalLabel{{ $orderItem->order_id }}">Chi tiết đơn hàng #{{ $orderItem->order_id }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h6 class="fw-bold">Thông tin đơn hàng</h6>
                                                                    <p><strong>Người đặt:</strong> {{ $orderItem->full_name }}</p>
                                                                    <p><strong>Số điện thoại:</strong> {{ $orderItem->phone }}</p>
                                                                    <p><strong>Địa chỉ:</strong> {{ $orderItem->address }}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h6 class="fw-bold">Chi tiết sản phẩm</h6>
                                                                    <p><strong>Tên sản phẩm:</strong> {{ $orderItem->name }}</p>
                                                                    <p><strong>Màu sắc:</strong> {{ $orderItem->color }}</p>
                                                                    <p><strong>Dung lượng:</strong> {{ $orderItem->storage }}</p>
                                                                    <p><strong>Giá:</strong> {{ number_format($orderItem->price, 0, ',', '.') }} VND</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Phân trang -->
                            <div class="d-flex justify-content-center mt-4">
                                {{ $order->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection