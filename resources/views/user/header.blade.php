@php
    use Illuminate\Support\Facades\Auth;
@endphp
<header id="header" class="site-header header-scrolled position-fixed text-black bg-light">
    <nav id="header-nav" class="navbar navbar-expand-lg px-3 mb-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">
          <img src="{{asset('images/logo.png')}}" class="logo">
        </a>
        <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <svg class="navbar-icon">
            <use xlink:href="#navbar-icon"></use>
          </svg>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
          <div class="offcanvas-header px-4 pb-0">
            <a class="navbar-brand" href="{{url('/')}}">
              <img src="{{asset('images/logo.png')}}" class="logo">
            </a>
            <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
          </div>
          <div class="offcanvas-body">
            <ul id="navbar" class="navbar-nav text-uppercase justify-content-end align-items-center flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link me-4 active" href="{{url('/')}}">Trang Chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4" href="{{url('/iphone')}}">IPHONE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4" href="{{url('/ipad')}}">ipad</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4" href="{{url('/macbook')}}">MACBOOK</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4" href="{{url('/watch')}}">Watch</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4" href="{{url('/airpods')}}">AIRPODS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4" href="{{url('/khuyen-mai')}}">Khuyến mãi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4" href="{{url('/tin-tuc')}}">tin tức</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link me-4 dropdown-toggle link-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">PAGE</a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="{{url('/ve-chung-toi')}}" class="dropdown-item">Về chúng tôi</a>
                  </li>
                  <li>
                    <a href="{{url('/tin-tuc')}}" class="dropdown-item">Tin tức</a>
                  </li>
                  <li>
                    <a href="{{url('/san-pham')}}" class="dropdown-item">sản phẩm</a>
                  </li>
                  <li>
                    <a href="{{url('/gio-hang')}}" class="dropdown-item">giỏ hàng</a>
                  </li>
                  <li>
                    <a href="{{url('/thanh-toan')}}" class="dropdown-item">Thanh Toán</a>
                  </li>
                  <li>
                    <a href="{{url('/lien-he')}}" class="dropdown-item">Liên hệ</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <div class="user-items ps-5">
                  <ul class="d-flex justify-content-end list-unstyled">
                    <li class="search-item pe-3">
                      <a href="{{url('/tim-kiem')}}" class="search-button">
                        <svg class="search">
                          <use xlink:href="#search"></use>
                        </svg>
                      </a>
                    </li>
                    
                    @if (Auth::check())  
                    <li class="nav-item dropdown">
                      <a class="nav-link me-4 dropdown-toggle link-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">{{Auth::user()->full_name }}</a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="{{ url('/') }}" class="dropdown-item">Thông Tin Tài Khoản</a>
                          </li>
                          <li>
                              <a href="{{ url('/dang-xuat') }}" class="dropdown-item">Đăng Xuất</a>
                          </li>
                      </ul>
                  </li>
                  @else
                  <li class="pe-3">
                    <a href="{{ asset('/dang-nhap') }}">
                        <svg class="user">
                            <use xlink:href="#user"></use>
                        </svg>
                    </a>
                </li>
                  @endif



                    <li>
                      <a href="{{asset('/gio-hang')}}">
                        <svg class="cart">
                          <use xlink:href="#cart"></use>
                        </svg>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>