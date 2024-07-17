@extends('admin/layout')
@section('title', 'Cập Nhật Người Dùng')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="pull-left">Add New User</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post_edit_user') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Tên:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Nhập Tên Người dùng" value="{{$user->full_name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Số điện thoại:</strong>
                                    <input type="number" name="phone" class="form-control" placeholder="Số điện thoại" maxlength="10" value="{{$user->phone}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Mật khẩu:</strong>
                                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu" value="{{$user->password}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Địa Chỉ:</strong>
                                    <input type="text" name="address" class="form-control" placeholder="Địa Chỉ"  value="{{$user->address}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Vai trò:</strong>
                                    <select class="form-control" name="role">
                                        @if ($user->role == 1)
                                        <option value="1" selected>Quản Trị Viên</option>
                                        <option value="0">Khách Hàng</option>
                                        @else
                                        <option value="1" selected>Quản Trị Viên</option>
                                        <option value="0" selected>Khách Hàng</option>
                                        @endif
                                    </select>
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