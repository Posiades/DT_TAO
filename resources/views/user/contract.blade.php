@extends('user/layout')
@section('title', 'LIÊN HỆ')
@section('content')
<section class="hero-section position-relative bg-light-blue padding-medium">
    <div class="hero-content">
      <div class="container">
        <div class="row">
          <div class="text-center padding-large no-padding-bottom">
            <h1 class="display-2 text-uppercase text-dark">Liên hệ</h1>
            <div class="breadcrumbs">
              <span class="item">
                <a href="index.html">Trang chủ ></a>
              </span>
              <span class="item">Liên hệ</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="contact-us padding-large">
    <div class="container">
      <div class="row">
        <div class="contact-info col-lg-6 pb-3">
          <h2 class="display-7 text-uppercase text-dark">Thông tin liên lạc</h2>
          <p>Hãy liên hệ với chúng tôi với bất kì thắc mắc nào của bạn</p>
          <div class="page-content d-flex flex-wrap">
            <div class="col-lg-6 col-sm-12">
              <div class="content-box text-dark pe-4 mb-5">
                <h3 class="card-title text-uppercase text-decoration-underline">Văn Phòng</h3>
                <div class="contact-address pt-3">
                  <p>Công viên phần mềm quang trung</p>
                </div>
                <div class="contact-number">
                  <p>
                    <a href="#">+84 033 674 5555</a>
                  </p>
                  <p>
                    <a href="#">+84 033 674 5555</a>
                  </p>
                </div>
                <div class="email-address">
                  <p>
                    <a href="#">tnv240803@gmail.com</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div class="content-box">
                <h3 class="card-title text-uppercase text-decoration-underline">Quản Lý</h3>
                <div class="contact-address pt-3">
                  <p>Công viên phần mềm quang trung</p>
                </div>
                <div class="contact-number">
                  <p>
                    <a href="#">+84 033 674 5555</a>
                  </p+84 033 674 5555
                  <p>
                    <a href="#">+84 033 674 5555</a>
                  </p>
                </div>
                <div class="email-address">
                  <p>
                    <a href="#">tnv240803@gmail.com</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @if (Session::has('user'))
        <div class="inquiry-item col-lg-6">
          @if(session('thanks'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('thanks') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <h2 class="display-7 text-uppercase text-dark">Bạn có câu hỏi nào không?</h2>
          <p>Sử dụng mẫu dưới đây để liên lạc với chúng tôi.</p>
          <form id="form" class="form-group flex-wrap" method="POST" action="{{route('post_contract')}}">
            @csrf
            <div class="form-input col-lg-12 d-flex mb-3">
              <input type="text" name="name" placeholder="Viết tên của bạn ở đây" class="form-control ps-3 me-3 mb-3" value="{{Session::get('user')->full_name}}">
              <input type="text" name="email" placeholder="Viết email của bạn ở đây" class="form-control ps-3 mb-3" value="{{Session::get('user')->email}}">
            </div>
            <div class="col-lg-12 mb-3">
              <input type="text" name="phone" placeholder="Số điện thoại" class="form-control ps-3" value="{{Session::get('user')->phone}}">
            </div>
            <div class="col-lg-12 mb-3">
              <input type="text" name="title" placeholder="Viết chủ đề của bạn" class="form-control ps-3">
            </div>
            <div class="col-lg-12 mb-3">
              <textarea placeholder="Viết nội dung của bạn" name="content" class="form-control ps-3" style="height:150px;"></textarea>
            </div>
            <button type="submit"  class="btn btn-dark btn-medium text-uppercase btn-rounded-none">Gửi</button>
          </form>
        </div>
        @else
        <div class="inquiry-item col-lg-6">
          @if(session('thanks'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('thanks') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <h2 class="display-7 text-uppercase text-dark">Bạn có câu hỏi nào không?</h2>
          <p>Sử dụng mẫu dưới đây để liên lạc với chúng tôi.</p>
          <form id="form" class="form-group flex-wrap" method="POST" action="{{route('post_contract')}}">
            @csrf
            <div class="form-input col-lg-12 d-flex mb-3">
              <input type="text" name="name" placeholder="Viết tên của bạn ở đây" class="form-control ps-3 me-3 mb-3">
              <input type="text" name="email" placeholder="Viết email của bạn ở đây" class="form-control ps-3 mb-3">
            </div>
            <div class="col-lg-12 mb-3">
              <input type="text" name="phone" placeholder="Số điện thoại" class="form-control ps-3">
            </div>
            <div class="col-lg-12 mb-3">
              <input type="text" name="title" placeholder="Viết chủ đề của bạn" class="form-control ps-3">
            </div>
            <div class="col-lg-12 mb-3">
              <textarea placeholder="Viết nội dung của bạn" name="content" class="form-control ps-3" style="height:150px;"></textarea>
            </div>
            <button type="submit"  class="btn btn-dark btn-medium text-uppercase btn-rounded-none">Gửi</button>
          </form>
        </div>
        @endif
      </div>
    </div>
  </div>
  <section id="our-store" class="padding-large no-padding-top">
    <div class="container">
      <div class="row d-flex flex-wrap align-items-center">
        <div class="col-lg-6">
          <div class="image-holder mb-5">
            <img src="images/single-image2.jpg" alt="our-store" class="img-fluid">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="locations-wrap">
            <div class="display-header">
              <h2 class="display-7 text-uppercase text-dark">cửa hàng của chúng tôi</h2>
              <p>Bạn cũng có thể trực tiếp mua sản phẩm từ các cửa hàng của chúng tôi.</p>
            </div>
            <div class="location-content d-flex flex-wrap">
              <div class="col-lg-6 col-sm-12">
                <div class="content-box text-dark pe-4 mb-5">
                  <h3 class="card-title text-uppercase text-decoration-underline">Văn Phòng</h3>
                  <div class="contact-address pt-3">
                    <p>Công viên phần mềm Quang Trung</p>
                  </div>
                  <div class="contact-number">
                    <p>
                      <a href="#">+84 033 674 5555</a>
                    </p>
                    <p>
                      <a href="#">+84 033 674 5555</a>
                    </p>
                  </div>
                  <div class="email-address">
                    <p>
                      <a href="#">tnv240803@gmail.com</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="content-box">
                  <h3 class="card-title text-uppercase text-decoration-underline">USA</h3>
                  <div class="contact-address pt-3">
                    <p>Công viên phần mềm Quang Trung</p>
                  </div>
                  <div class="contact-number">
                    <p>
                      <a href="#">+84 033 674 5555</a>
                    </p>
                    <p>
                      <a href="#">+84 033 674 5555</a>
                    </p>
                  </div>
                  <div class="email-address">
                    <p>
                      <a href="#">tnv240803@gmail.com</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection