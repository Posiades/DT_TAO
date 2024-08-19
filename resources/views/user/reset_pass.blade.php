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
      <button type="submit" class="btn btn-primary">Xác Nhận</button>
    </div>
  </form>
</div>

<script>
  document.getElementById('password-icon').addEventListener('click', function() {
    var passwordField = document.getElementById('password');
    var icon = this;

    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    } else {
      passwordField.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    }
  });

  document.getElementById('repass-icon').addEventListener('click', function() {
    var repassField = document.getElementById('repass');
    var icon = this;

    if (repassField.type === 'password') {
      repassField.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    } else {
      repassField.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    }
  });

  document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var password = document.getElementById('password').value;
    var repass = document.getElementById('repass').value;
    var errorMessage = document.getElementById('error-message');

    if (password === repass) {
      errorMessage.textContent = '';
      this.submit(); // Allow form submission if passwords match
    } else {
      errorMessage.textContent = 'Mật khẩu không khớp. Vui lòng thử lại.';
    }
  });
</script>
@endsection