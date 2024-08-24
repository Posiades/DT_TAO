@extends('admin/layout')
@section('title', 'Thêm Người Dùng')
@section('content')
<div class="container mt-5">
    @if(session('email'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('email') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="pull-left">Thêm Người Dùng</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post_add_user') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Tên:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Nhập Tên Người dùng">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Số điện thoại:</strong>
                                    <input type="number" name="phone" class="form-control" placeholder="Số điện thoại" maxlength="10">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Mật khẩu:</strong>
                                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Địa Chỉ:</strong>
                                    <input type="text" name="address" class="form-control" placeholder="Địa Chỉ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Vai trò:</strong>
                                    <select class="form-control" name="role">
                                        <option value="1">Quản Trị Viên</option>
                                        <option value="0">Khách Hàng</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                            <button type="submit" class="btn btn-primary">THêm Người Dùng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection