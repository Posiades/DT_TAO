@extends('admin/layout')
@section('title', 'ThêmMã Giảm Giá')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="pull-left">Thêm Voucher</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post_add_voucher') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Mã Voucher:</strong>
                                    <input type="text" name="code" class="form-control" placeholder="Nhập Mã Giảm giá">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Trị Giá:</strong>
                                    <input type="number" name="money" class="form-control" placeholder="Giá trị">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Ngày Tạo:</strong>
                                    <input type="date" name="create" class="form-control" placeholder="Ngày Tạo Voucher">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Hạn Voucher:</strong>
                                    <input type="date" name="end" class="form-control" placeholder="Ngày Hết Hạn">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>ID Sản Phẩm: </strong>
                                    <input type="number" name="id_product" class="form-control" placeholder="Để trống sẽ áp dụng cho tất cả sản phẩm">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>ID Người Dùng: </strong>
                                    <input type="id" name="id_user" class="form-control" placeholder="Để trống sẽ áp dụng cho tất cả người dùng">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Chọn Loại Sản Phẩm:</strong>
                                    <select class="form-control" name="id_category">
                                        <option value="1">Iphone</option>
                                        <option value="2">MacBook</option>
                                        <option value="3">Ipad</option>
                                        <option value="4">Watch</option>
                                        <option value="5">AirPods</option>
                                        <option value="0">Tất Cả</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Số Lượng:</strong>
                                    <input type="number" class="form-control" name="quantity" placeholder="Số Lượng Voucher">
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                            <button type="submit" class="btn btn-primary">Thêm Voucher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection