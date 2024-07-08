@extends('user/layout')
@section('title', 'Trang Chủ')
@section('content')
<section id="billboard" class="position-relative overflow-hidden bg-light-blue">
    <div class="swiper main-swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="container">
            <div class="row d-flex align-items-center">
              <div class="col-md-6">
                <div class="banner-content">
                  <h1 class="display-2 text-uppercase text-dark pb-5">Sản phẩm sắp ra mắt</h1>
                  <a href="{{url('/san-pham/iphone')}}" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Tới Sản Phẩm</a>
                </div>
              </div>
              <div class="col-md-5">
                <div class="image-holder">
                  <img src="images/banner-image.png" alt="banner">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="container">
            <div class="row d-flex flex-wrap align-items-center">
              <div class="col-md-6">
                <div class="banner-content">
                  <h1 class="display-2 text-uppercase text-dark pb-5">Sản phẩm giảm giá cao</h1>
                  <a href="{{url('/san-pham/iphone')}}" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Tới Sản Phẩm</a>
                </div>
              </div>
              <div class="col-md-5">
                <div class="image-holder">
                  <img src="images/banner-image.png" alt="banner">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-icon swiper-arrow swiper-arrow-prev">
      <svg class="chevron-left">
        <use xlink:href="#chevron-left" />
      </svg>
    </div>
    <div class="swiper-icon swiper-arrow swiper-arrow-next">
      <svg class="chevron-right">
        <use xlink:href="#chevron-right" />
      </svg>
    </div>
  </section>
  <section id="company-services" class="padding-large">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="cart-outline">
                <use xlink:href="#cart-outline" />
              </svg>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">Giao hàng miễn phí</h3>
              <p>Dịch vụ giao hàng miễn phí cho tất cả các đơn hàng.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="quality">
                <use xlink:href="#quality" />
              </svg>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">Đảm bảo chất lượng</h3>
              <p>Đảm bảo chất lượng, iPhone chính hãng, uy tín tuyệt đối.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="price-tag">
                <use xlink:href="#price-tag" />
              </svg>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">Ưu đãi hàng ngày</h3>
              <p>Ưu đãi mỗi ngày, giảm giá iPhone chính hãng, khuyến mãi hấp dẫn.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="shield-plus">
                <use xlink:href="#shield-plus" />
              </svg>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">Thanh toán an toàn</h3>
              <p>Thanh toán an toàn 100%, iPhone chính hãng, tin cậy tuyệt đối.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
    <div class="container">
      <div class="row">
        <div class="display-header d-flex justify-content-between pb-3">
          <h2 class="display-7 text-dark text-uppercase">Iphone</h2>
          <div class="btn-right">
            <a href="{{url('/san-pham/iphone')}}" class="btn btn-medium btn-normal text-uppercase">tới sản phẩm</a>
          </div>
        </div>
        <div class="swiper product-swiper">
          <div class="swiper-wrapper">
            @foreach ($product_iphone as $iphone)
            <div class="swiper-slide">
              <div class="product-card position-relative">
                <div class="image-holder">
                  <img src="{{asset($iphone->image_url)}}" alt="product-item" class="img-fluid">
                </div>
                <div class="cart-concern position-absolute">
                  <div class="cart-button d-flex">
                    <a href="{{ route('cart.add', $iphone->product_id) }}" class="btn btn-medium btn-black">Thêm vào giỏ hàng<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></a>
                  </div>
                </div>
                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                  <h3 class="card-title text-uppercase mb-0">
                      <a href="{{url("/chi-tiet/$iphone->slug")}}" class="text-decoration-none">{{$iphone->name}}</a>
                  </h3>
              </div>
                <h5 class="item-price text-primary">{{number_format($iphone->price_difference, 0, ',', '.'). 'VNĐ'}}</h5>
              </div>
          </div>
          @endforeach
          
        </div>
      </div>
    </div>
    <div class="swiper-pagination position-absolute text-center"></div>
 
  </section>
  <section id="smart-watches" class="product-store padding-large position-relative">
    <div class="container">
      <div class="row">
        <div class="display-header d-flex justify-content-between pb-3">
          <h2 class="display-7 text-dark text-uppercase">Apple Watch</h2>
          <div class="btn-right">
            <a href="shop.html" class="btn btn-medium btn-normal text-uppercase">Tới sản phẩm</a>
          </div>
        </div>
        <div class="swiper product-watch-swiper">
          <div class="swiper-wrapper">
            @foreach ($product_watch as $watch)
            <div class="swiper-slide">
              <div class="product-card position-relative">
                <div class="image-holder">
                  <img src="{{asset($watch->image_url)}}" alt="product-item" class="img-fluid">
                </div>
                <div class="cart-concern position-absolute">
                  <div class="cart-button d-flex">
                    <a href="{{ route('cart.add', $watch->product_id) }}" class="btn btn-medium btn-black">Thêm vào giỏ hàng<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></a>
                  </div>
                </div>
                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                  <h3 class="card-title text-uppercase">
                    <a href="{{url("/chi-tiet/$watch->slug")}}">{{$watch->name}}</a>
                  </h3>
                </div>
                <h5 class="item-price text-primary">{{number_format($watch->price_difference, 0, ',', '.'). 'VNĐ'}}</h5>
              </div>
            </div>
            @endforeach

              <div class="product-card position-relative">
                <div class="image-holder">
                  <img src="images/product-item10.jpg" alt="product-item" class="img-fluid">
                </div>
                <div class="cart-concern position-absolute">
                  <div class="cart-button d-flex">
                    <a href="#" class="btn btn-medium btn-black">Thêm vào giỏ hàng<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></a>
                  </div>
                </div>
                <div class="card-detail d-flex justify-content-between pt-3">
                  <h3 class="card-title text-uppercase">
                    <a href="#">black watch</a>
                  </h3>
                  <span class="item-price text-primary">$750</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-pagination position-absolute text-center"></div>
  </section>
  <section id="yearly-sale" class="bg-light-blue overflow-hidden mt-5 padding-xlarge" style="background-image: url('images/single-image1.png');background-position: right; background-repeat: no-repeat;">
    <div class="row d-flex flex-wrap align-items-center">
      <div class="col-md-6 col-sm-12">
        <div class="text-content offset-4 padding-medium">
          <h3>Giảm 10%</h3>
          <h2 class="display-2 pb-5 text-uppercase text-dark">Giảm giá mùa hè</h2>
          <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Sản Phẩm Giảm Giá</a>
        </div>
      </div>
      <div class="col-md-6 col-sm-12">
        
      </div>
    </div>
  </section>
  <section id="latest-blog" class="padding-large">
    <div class="container">
      <div class="row">
        <div class="display-header d-flex justify-content-between pb-3">
          <h2 class="display-7 text-dark text-uppercase">Tin tức mới nhất</h2>
          <div class="btn-right">
            <a href="blog.html" class="btn btn-medium btn-normal text-uppercase">Tới tin tức</a>
          </div>
        </div>
        <div class="post-grid d-flex flex-wrap justify-content-between">
          <div class="col-lg-4 col-sm-12">
            <div class="card border-none me-3">
              <div class="card-image">
                <img src="images/post-item1.jpg" alt="" class="img-fluid">
              </div>
            </div>
            <div class="card-body text-uppercase">
              <div class="card-meta text-muted">
                <span class="meta-date">22 tháng 6 2024</span>
                <span class="meta-category">- Ảnh</span>
              </div>
              <h3 class="card-title">
                <a href="#">Apple The Exchange TRX hiện đã khai trương tại Kuala Lumpur</a>
              </h3>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="card border-none me-3">
              <div class="card-image">
                <img src="images/post-item2.jpg" alt="" class="img-fluid">
              </div>
            </div>
            <div class="card-body text-uppercase">
              <div class="card-meta text-muted">
                <span class="meta-date">20 tháng 6 2024</span>
                <span class="meta-category">- Đọc Nhanh</span>
              </div>
              <h3 class="card-title">
                <a href="#">Các phiên bản mới của Final Cut Pro dành cho iPad và Mac ra mắt hôm nay</a>
              </h3>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="card border-none me-3">
              <div class="card-image">
                <img src="images/post-item3.jpg" alt="" class="img-fluid">
              </div>
            </div>
            <div class="card-body text-uppercase">
              <div class="card-meta text-muted">
                <span class="meta-date">19 tháng 6 2024</span>
                <span class="meta-category">- Thông báo bảo chì</span>
              </div>
              <h3 class="card-title">
                <a href="#">Apple The Exchange TRX sẽ chào đón những khách hàng đầu tiên vào Thứ Bảy, ngày 22 tháng 6, tại Kuala Lumpur</a>
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
@endsection