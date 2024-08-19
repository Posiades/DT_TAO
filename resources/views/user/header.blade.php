
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
                <a class="nav-link me-4" href="{{url('/')}}">Trang Chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4" href="{{ route('products.filter', ['category_id' => 1]) }}">IPHONE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4" href="{{ route('products.filter', ['category_id' => 3]) }}">ipad</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4" href="{{ route('products.filter', ['category_id' => 2]) }}">MACBOOK</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4" href="{{ route('products.filter', ['category_id' => 4]) }}">Watch</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4" href="{{ route('products.filter', ['category_id' => 5]) }}">AIRPODS</a>
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
                    <a href="{{url('/san-pham')}}" class="dropdown-item">Sản phẩm</a>
                  </li>
                  <li>
                    <a href="{{url('/gio-hang')}}" class="dropdown-item">Giỏ hàng</a>
                  </li>
                  <li>
                    <a href="{{url('/thanh-toan')}}" class="dropdown-item">Thanh Toán</a>
                  </li>
                  <li>
                    <a href="{{url('/lien-he')}}" class="dropdown-item">Liên hệ</a>
                  </li>
                  @if(Session::has('user'))
                    <li class="nav-item dropdown">
                      <a class="nav-link me-4 dropdown-toggle link-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">{{ Session::get('user')->full_name }}</a>
                      <ul class="dropdown-menu">
                        <li>
                          @if (Session::get('user')->role != 1)
                            <a href="{{ route('client.index') }}" class="dropdown-item">Thông Tin Tài Khoản</a>
                          @else
                            <a href="{{ route('admin_index') }}" class="dropdown-item">Trang Quản Trị</a>
                          @endif
                        </li>
                        <li>
                          <a href="{{ url('/dang-xuat') }}" class="dropdown-item">Đăng Xuất</a>
                        </li>
                      </ul>
                    </li>
                  @else
                    <li>
                      <a href="{{url('/dang-nhap')}}" class="dropdown-item">Đăng Nhập</a>
                    </li>
                  @endif
                </ul>
              </li>
              
              <li class="nav-item">
                <div class="user-items ps-5">
                  <ul class="d-flex justify-content-end list-unstyled">
                    <li class="search-item pe-3">
                      <a href="#" class="search-button">
                        <svg class="search">
                          <use xlink:href="#search"></use>
                        </svg>
                      </a>
                    </li>

        @if(Session::has('user'))
            <li class="nav-item dropdown">
              <a class="nav-link me-4 dropdown-toggle link-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">{{ Session::get('user')->full_name }}</a>
              <ul class="dropdown-menu">
                  <li>
                      @if (Session::get('user')->role != 1)
                        <a href="{{ route('client.index') }}" class="dropdown-item">Thông Tin Tài Khoản</a>
                      @else
                        <a href="{{ route('admin_index') }}" class="dropdown-item">Trang Quản TRị</a>
                      @endif
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
                        @if (Session::has('cart'))
                            {{ count(Session::get('cart')) }}
                        @else
                            0
                        @endif
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