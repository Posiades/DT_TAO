@extends('admin/layout')
@section('title', 'Sửa Sản Phẩm')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Chỉnh Sửa Sản Phẩm</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post_edit_product', ['id' => $product->product_id]) }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="type" value="{{ $product->category_id }}">
                        <input type="hidden" name="id" value="{{ $product->product_id }}">

                        <div class="form-group mb-3">
                            <label for="name"><strong>Tên Sản Phẩm:</strong></label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Nhập Tên Sản Phẩm" value="{{ $product->name }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="color"><strong>Màu Sắc:</strong></label>
                            <input type="text" id="color" name="color" class="form-control" placeholder="Nhập Màu Sắc" value="{{ $product->color }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="storage"><strong>Bộ Nhớ:</strong></label>
                            <input type="text" id="storage" name="storage" class="form-control" placeholder="Nhập Dung Lượng" value="{{ $product->storage }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="image_url"><strong>Hình Ảnh:</strong></label>
                            <input type="file" id="image_url" name="image_url" class="form-control">
                            @if ($product->image_url)
                                <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image" class="img-fluid mt-2" style="max-height: 200px;">
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="price"><strong>Giá:</strong></label>
                            <div class="input-group">
                                <input type="text" id="price" name="price" class="form-control" placeholder="Giá" value="{{ $product->price }}" required>
                                <span class="input-group-text">VNĐ</span>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="configtion"><strong>Cấu Hình:</strong></label>
                            <textarea id="configtion" name="configtion" class="form-control" rows="4" placeholder="Nội dung cấu hình">{{ $product->configtion }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description"><strong>Nội Dung:</strong></label>
                            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Nội dung">{{ $product->description }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="quantity"><strong>Số Lượng:</strong></label>
                            <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Số Lượng" value="{{ $product->quantity }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="status"><strong>Trạng Thái:</strong></label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="Còn Hàng" {{ $product->status == 'Còn Hàng' ? 'selected' : '' }}>Còn Hàng</option>
                                <option value="Hết Hàng" {{ $product->status == 'Hết Hàng' ? 'selected' : '' }}>Hết Hàng</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                            <a href="{{ route('product') }}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
