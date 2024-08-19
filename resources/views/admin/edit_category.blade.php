@extends('admin/layout')
@section('title', 'Sửa Danh Mục')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Chỉnh Sửa Danh Mục</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post_edit_category') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->category_id }}">
                        
                        <div class="form-group mb-3">
                            <label for="name"><strong>Tên Danh Mục:</strong></label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Nhập Tên Danh Mục" value="{{ $category->name }}" required>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                            <a href="{{ route('category') }}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
