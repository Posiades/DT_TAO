@extends('admin/layout')
@section('title', 'Sửa Đơn Hàng')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Sửa Đơn Hàng</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post_edit_order') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{ $order->order_id }}">
                        <input type="hidden" name="detail_id" value="{{ $order->order_detail_id }}">

                        <div class="form-group">
                            <label>User ID (nếu có)</label>
                            <select name="user_id" class="form-select" required>
                                @foreach($user as $order)
                                    <option value="{{ $order->user_id }}">  {{ $order->email }} - {{ $order->user_id }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="order_date"><strong>Ngày Đặt Hàng:</strong></label>
                            <input type="date" id="order_date" class="form-control" name="order_date" value="{{ $order->order_date }}">
                        </div>

                        <div class="form-group">
                            <label>ID Sản Phẩm</label>
                            <select name="product_id" id="product" class="form-select" required>
                                @foreach($product as $order)
                                    <option value="{{ $order->product_id}}" data-price="{{ $order->price }}">
                                        {{ $order->name }} {{ $order->color }} {{ "$order->storage"  }} - <strong>ID:</strong> {{ $order->product_id }}
                                    </option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="quantity"><strong>Số Lượng:</strong></label>
                            <input type="number" id="quantity" class="form-control" name="quantity" value="{{ $order->quantity }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="status"><strong>Trạng Thái:</strong></label>
                            <select id="status" class="form-control" name="status">
                                <option value="1" {{ $order->status == "Chưa Thanh Toán" ? 'selected' : '' }}>Chưa Thanh Toán</option>
                                <option value="2" {{ $order->status == "Đã Thanh Toán" ? 'selected' : '' }}>Đã Thanh Toán</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="price"><strong>Giá:</strong></label>
                            <input type="number" id="price" class="form-control" name="price" value="{{ $order->price }}">
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                            <a href="{{ route('order') }}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
