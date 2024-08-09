@extends('admin/layout')
@section('title', 'Thêm Danh Mục')
@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-12">
            <h2 class="text-center">Thêm Danh Mục Sản Phẩm</h2>
        </div>
    </div>
    <div class="card mx-auto" style="max-width: 800px;">
        <div class="card-body">
            <form method="POST" action="{{ route('post_add_category') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Tên Danh Mục:</strong></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nhập Tên Danh Mục" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
