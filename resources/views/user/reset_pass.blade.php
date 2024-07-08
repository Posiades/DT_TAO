@extends('user/layout')
@section('title', 'Đổi Mật Khẩu Mới')
@section('name')
<form method="post" action="{{url('/')}}">
    @csrf
    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-person-fill"></i>
        </span>
        <input name="pass" type="text" class="form-control custom-input" id="inputUsername" placeholder="Nhập Mật Khẩu Mới">
      </div>
    </div>
    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-person-fill"></i>
        </span>
        <input name="re_pass" type="text" class="form-control custom-input" id="inputUsername" placeholder="Nhập Lại Mật Khẩu Mới">
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-auto">
        <button type="submit" class="btn btn-outline-secondary">
          <i class="bi bi-person-plus-fill"></i> Xác Nhận
        </button>
      </div>
  </form>
@endsection