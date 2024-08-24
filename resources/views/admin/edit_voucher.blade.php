@extends('admin/layout')
@section('title', 'Sửa Mã Giảm Giá')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Sửa Mã Giảm Giá</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post_edit_voucher', ['id' => $voucher->voucher_id]) }}" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name="id" value="{{ $voucher->voucher_id }}">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="code"><strong>Mã Voucher:</strong></label>
                                    <input type="text" id="code" name="code" class="form-control" placeholder="Nhập Mã Giảm giá" value="{{ $voucher->code }}">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="money"><strong>Trị Giá:</strong></label>
                                    <input type="number" id="money" name="money" class="form-control" placeholder="Giá trị" value="{{ $voucher->discount_amount }}">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="create"><strong>Ngày Tạo:</strong></label>
                                    <input type="date" id="create" name="create" class="form-control" value="{{ $voucher->create_date }}">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="end"><strong>Hạn Voucher:</strong></label>
                                    <input type="date" id="end" name="end" class="form-control" value="{{ $voucher->expiry_date }}">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="id_product"><strong>ID Sản Phẩm:</strong></label>
                                    <select name="id_product" class="form-select" required>
                                        @foreach($product as $item)
                                            <option value="{{ $item->product_id }}">  {{ $item->name }} - {{ $item->color }} - {{ $item->storage }} - {{$item->product_id}}
                                            </option>
                                            <option value="{{null}}">Tất cả sản phẩm</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="id_user"><strong>ID Người Dùng:</strong></label>
                                    <select name="id_user" class="form-select" required>
                                        @foreach($user as $user)
                                            <option value="{{ $user->user_id }}">  {{ $user->email }} - {{ $user->user_id }} 
                                            </option>
                                            <option value="{{null}}">Tất cả người dùng</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="id_category"><strong>Chọn Loại Sản Phẩm:</strong></label>
                                    <select id="id_category" class="form-control" name="id_category">
                                        <option value="1" {{ $voucher->category_id == 1 ? 'selected' : '' }}>Iphone</option>
                                        <option value="2" {{ $voucher->category_id == 2 ? 'selected' : '' }}>MacBook</option>
                                        <option value="3" {{ $voucher->category_id == 3 ? 'selected' : '' }}>Ipad</option>
                                        <option value="4" {{ $voucher->category_id == 4 ? 'selected' : '' }}>Watch</option>
                                        <option value="5" {{ $voucher->category_id == 5 ? 'selected' : '' }}>AirPods</option>
                                        <option value="0" {{ $voucher->category_id == 0 ? 'selected' : '' }}>Tất Cả</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="quantity"><strong>Số Lượng:</strong></label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Số Lượng Voucher" value="{{ $voucher->quantity }}">
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                            <a href="{{ route('voucher') }}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
