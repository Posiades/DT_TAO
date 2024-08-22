@extends('user/layout')
@section('title', 'Đăng Nhập')
@section('content')

@if(session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


{{-- ================ End Session THông Báo =================--}}

<section class="hero-section position-relative bg-light-blue padding-medium">
  <div class="hero-content">
    <div class="container">
      <div class="row">
        <div class="text-center padding-large no-padding-bottom">
          <h1 class="display-2 text-uppercase text-dark">ĐĂNG NHẬP</h1>
          <div class="breadcrumbs">
            <span class="item">
              <a href="index.html">Home ></a>
            </span>
            <span class="item">ĐĂNG NHẬP</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ============= Session thông báo ============== --}}
@if(session('login_fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('login_fail') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('not_admin'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('not_admin') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('success_resetpass'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_resetpass') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


{{-- =================================== SIDE ================================ --}}

<div class="container p-5">
  <div class="text-center mb-4">
    <h2>ĐĂNG NHẬP</h2>
    <p>Đăng nhập tài khoản và mật khẩu để truy cập vào DT Táo</p>
  </div>

  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-person-fill"></i>
        </span>
        <input name="email" type="text" class="form-control custom-input" id="inputUsername" placeholder="Nhập Email">
      </div>
    </div>

    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-shield-lock-fill"></i>
        </span>
        <input name="password" type="password" class="form-control custom-input" id="password" placeholder="Nhập mật khẩu">
        <span class="input-group-text">
          <i id="password-icon" class="fas fa-eye password-icon"></i>
        </span>
      </div>
    </div>

    <div class="text-center mb-3">
      <button type="submit" class="btn btn-primary">
        <i class="bi bi-box-arrow-in-right"></i> Đăng Nhập
      </button>
    </div>

    <div class="row justify-content-center">
      <div class="col-auto">
        <a href="{{url('/dang-ky')}}" class="btn btn btn-primary">
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