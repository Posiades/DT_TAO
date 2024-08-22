@extends('user/layout')
@section('title', 'Đăng Ký')
@section('content')
<section class="hero-section position-relative bg-light-blue padding-medium">
  <div class="hero-content">
    <div class="container">
      <div class="row">
        <div class="text-center padding-large no-padding-bottom">
          <h1 class="display-2 text-uppercase text-dark">Đăng ký</h1>
          <div class="breadcrumbs">
            <span class="item">
              <a href="index.html">Trang chủ ></a>
            </span>
            <span class="item">Đăng ký</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<div class="container p-5">
  <div class="text-center mb-4">
    <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
    <p>Đăng ký tài khoản và mật khẩu để đăng nhập vào DT Táo</p>
  </div>

  <form id="myForm" method="POST" action="{{url('/post_register')}}">
    @csrf
    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-envelope-fill"></i>
        </span>
        <input name="email" class="form-control form-control-lg" type="email" placeholder="Email" aria-label=".form-control-lg example" required>
      </div>
    </div>
    
    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-person-fill"></i>
        </span>
        <input name="fullname" class="form-control form-control-lg" type="text" placeholder="Họ và tên" aria-label=".form-control-lg example" required>
      </div>
    </div>
    
    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-house-fill"></i>
        </span>
        <input name="address" class="form-control form-control-lg" type="text" placeholder="Địa chỉ" aria-label=".form-control-lg example" required>
      </div>
    </div>
    
    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-phone-fill"></i>
        </span>
        <input name="phone" class="form-control form-control-lg" type="tel" placeholder="Điện thoại" aria-label=".form-control-lg example" required>
      </div>
    </div>

    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-shield-lock-fill"></i>
        </span>
        <input name="pass" class="form-control form-control-lg" type="password" id="password" placeholder="Mật khẩu" aria-label=".form-control-lg example" pattern="^(?=.*[A-Z])(?=.*[\W_]).{8,}$" title="Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm ít nhất một ký tự chữ hoa và một ký tự đặc biệt." required>
        <span class="input-group-text">
          <i id="password-icon" class="fas fa-eye password-icon"></i>
        </span>
      </div>
    </div>
    
    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-shield-lock-fill"></i>
        </span>
        <input name="re_pass" class="form-control form-control-lg" type="password" id="repass" placeholder="Nhập lại mật khẩu" aria-label=".form-control-lg example" pattern="^(?=.*[A-Z])(?=.*[\W_]).{8,}$" title="Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm ít nhất một ký tự chữ hoa và một ký tự đặc biệt." required>
        <span class="input-group-text">
          <i id="repass-icon" class="fas fa-eye password-icon"></i>
        </span>
      </div>
    </div>

    <br><p id="error-message" style="color: red;"></p><br>
    <div class="text-center mb-3">
      <button type="submit" class="btn btn-primary">Đăng Ký</button>
    </div>
  </form>
</div>

@endsection
