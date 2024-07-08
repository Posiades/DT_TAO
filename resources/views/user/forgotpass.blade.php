@extends('user/layout')
@section('title', 'Quên Mật Khẩu')
@section('content')
<section class="hero-section position-relative bg-light-blue padding-medium">
    <div class="hero-content">
      <div class="container">
        <div class="row">
          <div class="text-center padding-large no-padding-bottom">
            <h1 class="display-2 text-uppercase text-dark">FORGOT</h1>
            <div class="breadcrumbs">
              <span class="item">
                <a href="index.html">Home ></a>
              </span>
              <span class="item">Forgot</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- ====================== Session Flast =================== --}}
  @if(session('token_wrong'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('token_wrong') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('change_pass'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('change_pass') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('email_null'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('email_null') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
  <div class="container p-5">
    <div class="text-center mb-4">
      <h2>Lấy Lại Mật Khẩu</h2>
      <p>Nhập Email Để Lấy Lại Mật Khẩu Cũ</p>
    </div>
  
    <form method="post" action="{{url('/xac-thuc-tai-khoan')}}">
      @csrf
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text">
            <i class="bi bi-person-fill"></i>
          </span>
          <input name="email" type="text" class="form-control custom-input" id="inputUsername" placeholder="Nhập Email">
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-auto">
          <button type="submit" class="btn btn-outline-secondary">
            <i class="bi bi-person-plus-fill"></i> Gửi Yêu Cầu
          </button>
        </div>
    </form>

        <div class="col-auto">
          <a href="{{url('/dang-ky')}}" class="btn btn-outline-secondary">
            <i class="bi bi-shield-question"></i> Đăng Ký
          </a>
        </div>
      </div>
  </div>
@endsection