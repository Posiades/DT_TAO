@extends('client/layout')
@section('title', 'Chỉnh Sửa Thông Tin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit User Information</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post_edit_info', ['id' => $user->user_id]) }}">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="name">Tên:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $user->full_name }}">
                        </div>
                        <div class="form-group mt-2">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group mt-2">
                            <label for="address">Địa chỉ:</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ $user->address }}">
                        </div>
                        <div class="form-group mt-2">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ $user->phone }}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Lưu thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection