@extends('user/layout')
@section('title', 'Đăng Nhập')
@section('content')
<section class="hero-section position-relative bg-light-blue padding-medium">
  <div class="hero-content">
    <div class="container">
      <div class="row">
        <div class="text-center padding-large no-padding-bottom">
          <h1 class="display-2 text-uppercase text-dark">LOGIN</h1>
          <div class="breadcrumbs">
            <span class="item">
              <a href="index.html">Home ></a>
            </span>
            <span class="item">Login</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container p-5">
  <div class="text-center mb-4">
    <h2>ĐĂNG NHẬP</h2>
    <p>Đăng nhập tài khoản và mật khẩu để truy cập vào DT Táo</p>
  </div>

  <form>
    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-person-fill"></i>
        </span>
        <input type="text" class="form-control custom-input" id="inputUsername" placeholder="Nhập tài khoản">
      </div>
    </div>

    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-shield-lock-fill"></i>
        </span>
        <input type="password" class="form-control custom-input" id="inputPassword" placeholder="Nhập mật khẩu">
      </div>
    </div>

    <div class="text-center mb-3">
      <button type="submit" class="btn btn-primary">
        <i class="bi bi-box-arrow-in-right"></i> Đăng Nhập
      </button>
    </div>

    <div class="row justify-content-center">
      <div class="col-auto">
        <a href="{{url('/dang-ky')}}" class="btn btn-outline-secondary">
          <i class="bi bi-person-plus-fill"></i> Đăng Ký
        </a>
      </div>
      <div class="col-auto">
        <a href="{{url('/quen-mat-khau')}}" class="btn btn-outline-secondary">
          <i class="bi bi-shield-question"></i> Quên Mật Khẩu
        </a>
      </div>
    </div>
  </form>
</div>
@endsection