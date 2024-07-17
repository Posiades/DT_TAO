@extends('admin/layout')
@section('title', 'Thêm Mã Giảm Giá')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="pull-left">Add New Voucher</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post_add_voucher') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Mã Voucher:</strong>
                                    <input type="text" name="code" class="form-control" placeholder="Nhập Mã Giảm giá">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Trị Giá:</strong>
                                    <input type="number" name="value" class="form-control" placeholder="Giá trị">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Ngày Tạo:</strong>
                                    <input type="date" name="create" class="form-control" placeholder="Ngày Tạo Voucher">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Hạn Voucher:</strong>
                                    <input type="date" name="end" class="form-control" placeholder="Ngày Hết Hạn">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Số Lượng:</strong>
                                    <input type="number" name="quantity" class="form-control" placeholder="Số Lượng Voucher">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection