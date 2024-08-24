@extends('admin/layout')
@section('title', 'Thêm Sản Phẩm')
@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-12">
            <h2 class="text-center">Thêm Sản Phẩm Mới</h2>
        </div>
    </div>
    <div class="card mx-auto" style="max-width: 800px;">
        <div class="card-body">
            <form method="POST" action="{{ url('/admin/post_add_sp') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="option" class="form-label"><strong>Chọn Loại Sản Phẩm:</strong></label>
                    <select class="form-select" name="option" id="option">
                        <option value="1">Iphone</option>
                        <option value="2">MacBook</option>
                        <option value="3">Ipad</option>
                        <option value="4">Watch</option>
                        <option value="5">AirPods</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Tên Sản Phẩm:</strong></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nhập Tên Sản Phẩm" required>
                </div>

                <div class="mb-3">
                    <label for="configtion" class="form-label"><strong>Cấu Hình:</strong></label>
                    <textarea name="configtion" id="configtion" class="form-control" rows="4" placeholder="Nội dung cấu hình cách nhau bởi dấu ,"></textarea>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label"><strong>Màu Sắc:</strong></label>
                    <input type="text" name="color" id="color" class="form-control" placeholder="Nhập Màu Sắc (In Hoa Các Ký Tự Đầu) - Airpods không cần nhập" >
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label"><strong>Hình Ảnh:</strong></label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="storage" class="form-label"><strong>Bộ Nhớ:</strong></label>
                    <input type="text" name="storage" id="storage" class="form-control" placeholder="Dung Lượng Bộ Nhớ - Airpods không cần nhập" >
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label"><strong>Giá:</strong></label>
                    <div class="input-group">
                        <input type="text" name="price" id="price" class="form-control" placeholder="Giá" aria-label="Giá" required>
                        <span class="input-group-text">VNĐ</span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mota" class="form-label"><strong>Nội Dung:</strong></label>
                    <textarea name="mota" id="mota" class="form-control" rows="4" placeholder="Nội dung"></textarea>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label"><strong>Số Lượng:</strong></label>
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Số Lượng" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label"><strong>Hot:</strong></label>
                    <select name="hot" id="status" class="form-select">
                        <option value="0" selected>Sản Phẩm Bình Thường</option>
                        <option value="1">Sản Phẩm Bán Chạy</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
