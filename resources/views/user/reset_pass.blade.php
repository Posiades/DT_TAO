@extends('user/layout')
@section('title', 'Đổi Mật Khẩu Mới')
@section('content')
<section class="hero-section position-relative bg-light-blue padding-medium">
  <div class="hero-content">
    <div class="container">
      <div class="row">
        <div class="text-center padding-large no-padding-bottom">
          <h1 class="display-2 text-uppercase text-dark">Đặt Lại Khẩu Mới</h1>
          <div class="breadcrumbs">
            <span class="item">
              <a href="index.html">Home ></a>
            </span>
            <span class="item">Đặt Lại Khẩu Mới</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container p-5">
  <div class="text-center mb-4">
    <h2>TẠO MẬT KHẨU MỚI</h2>
    <p>Nhập mật khẩu mới để đăng nhập vào DT Táo</p>
  </div>

  @if(session('change_fail'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('change_fail') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

  <form method="POST" action="{{url('/post_createpass')}}">
    @csrf
    <input name="email" type="hidden" value="{{$email}}">
    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-shield-lock-fill"></i>
        </span>
        <input name="pass" class="form-control form-control-lg" type="password" placeholder="Mật khẩu" aria-label=".form-control-lg example" required>
      </div>
    </div>
    
    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-shield-lock-fill"></i>
        </span>
        <input name="re_pass" class="form-control form-control-lg" type="password" placeholder="Nhập lại mật khẩu" aria-label=".form-control-lg example" required>
      </div>
    </div>

    <div class="text-center mb-3">
      <button type="submit" class="btn btn-primary">Xác Nhận</button>
    </div>
  </form>
</div>
@endsection