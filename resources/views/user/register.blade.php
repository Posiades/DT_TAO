@extends('user/layout')
@section('title', 'Đăng Ký')
@section('content')
<section class="hero-section position-relative bg-light-blue padding-medium">
  <div class="hero-content">
    <div class="container">
      <div class="row">
        <div class="text-center padding-large no-padding-bottom">
          <h1 class="display-2 text-uppercase text-dark">Register</h1>
          <div class="breadcrumbs">
            <span class="item">
              <a href="index.html">Home ></a>
            </span>
            <span class="item">Register</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container p-5">
  <div class="text-center mb-4">
    <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
    <p>Đăng ký tài khoản và mật khẩu để đăng nhập vào DT Táo</p>
  </div>

  <form>
    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-person-fill"></i>
        </span>
        <input class="form-control form-control-lg" type="text" placeholder="Tài khoản" aria-label=".form-control-lg example">
      </div>
    </div>

    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-shield-lock-fill"></i>
        </span>
        <input class="form-control form-control-lg" type="password" placeholder="Mật khẩu" aria-label=".form-control-lg example">
      </div>
    </div>

    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-shield-lock-fill"></i>
        </span>
        <input class="form-control form-control-lg" type="password" placeholder="Nhập lại mật khẩu" aria-label=".form-control-lg example">
      </div>
    </div>

    <div class="text-center mb-3">
      <button type="button" class="btn btn-primary">Đăng Ký</button>
    </div>
  </form>
</div>
@endsection