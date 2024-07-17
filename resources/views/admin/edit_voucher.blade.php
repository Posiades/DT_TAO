@extends('admin/layout')
@section('title', 'Sửa Mã Giảm Giá')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="pull-left">Edit Voucher</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post_edit_voucher', ['id'=>$voucher->voucher_id]) }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" id="id" value="{{$voucher->voucher_id}}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Mã Voucher:</strong>
                                    <input type="text" name="code" class="form-control" placeholder="Nhập Mã Giảm giá" value="{{$voucher->code}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Trị Giá:</strong>
                                    <input type="number" name="money" class="form-control" placeholder="Giá trị" value="{{$voucher->discount_amount}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Ngày Tạo:</strong>
                                    <input type="date" name="create" class="form-control" placeholder="Ngày Tạo Voucher" value="{{$voucher->create_date}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Hạn Voucher:</strong>
                                    <input type="date" name="end" class="form-control" placeholder="Ngày Hết Hạn" value="{{$voucher->expiry_date}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Số Lượng:</strong>
                                    <input type="number" class="form-control" name="quantity" placeholder="Số Lượng Voucher" value="{{$voucher->quantity}}">
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