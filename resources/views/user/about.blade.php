@extends('user/layout')
@section('title', 'Về Chúng Tôi')
@section('content')
<section class="hero-section position-relative bg-light-blue padding-medium">
    <div class="hero-content">
      <div class="container">
        <div class="row">
          <div class="text-center padding-large no-padding-bottom">
            <h1 class="display-2 text-uppercase text-dark">Về Chúng Tôi</h1>
            <div class="breadcrumbs">
              <span class="item">
                <a href="index.html">Trang Chủ ></a>
              </span>
              <span class="item">Về Chúng Tôi</span>
            </div>
          </div>
        </div>
      </div>
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
              <h3 class="card-title text-uppercase text-dark">Thanh toán an toàn 100%</h3>
              <p>Thanh toán an toàn 100%, iPhone chính hãng, tin cậy tuyệt đối.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="about-us" class="padding-large no-padding-top">
    <div class="container">
      <div class="row d-flex flex-wrap align-items-center justify-content-between">
        <div class="col-lg-6 col-md-12">
          <div class="image-holder mb-4">
            <div>
              <img src="images/single-image3.jpg" alt="single" class="single-image">
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="detail ps-5">
            <div class="display-header">
              <h2 class="display-7 text-uppercase text-dark">DT Táo được tìm thấy như thế nào?</h2>
              <p class="pb-3">Cười lớn, shop điện thoại Táo luôn mang đến những sản phẩm sáng tạo và đột phá. Với việc cung cấp các thiết bị hiện đại và tiên tiến, shop điện thoại Táo đã cải thiện cuộc sống của hàng triệu người dùng. Các sản phẩm của shop không chỉ đẹp về hình thức mà còn mạnh mẽ về tính năng. Chúng ta có thể thấy điều này qua các mẫu điện thoại thông minh và máy tính bảng, những sản phẩm đã trở thành biểu tượng của sự sáng tạo và công nghệ cao. Shop điện thoại Táo thực sự đã thay đổi cách chúng ta tương tác với công nghệ, mang lại sự tiện lợi và hiệu quả vượt trội cho khách hàng.</br>
              Sử dụng điện thoại Táo, bạn sẽ luôn cảm thấy hài lòng. Với thiết kế tinh tế và hiệu năng vượt trội, các sản phẩm của Táo luôn dẫn đầu trong ngành công nghệ. Mọi chi tiết, từ giao diện người dùng đến hiệu suất làm việc, đều được tối ưu để mang lại trải nghiệm tốt nhất. Điện thoại Táo không chỉ là một thiết bị, mà còn là biểu tượng của sự sáng tạo và đổi mới. Sở hữu một chiếc điện thoại Táo, bạn sẽ cảm nhận được sự khác biệt rõ rệt trong cuộc sống hàng ngày.</p>
              <a href="#" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Cửa hàng của chúng tôi</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="testimonials" class="position-relative">
    <div class="container">
      <div class="row">
        <div class="review-content position-relative">
          <div class="swiper-icon swiper-arrow swiper-arrow-prev position-absolute d-flex align-items-center">
            <svg class="chevron-left">
              <use xlink:href="#chevron-left" />
            </svg>
          </div>
          <div class="swiper testimonial-swiper">
            <div class="quotation text-center">
              <svg class="quote">
                <use xlink:href="#quote" />
              </svg>
            </div>
            <div class="swiper-wrapper">
              <div class="swiper-slide text-center d-flex justify-content-center">
                <div class="review-item col-md-10">
                  <i class="icon icon-review"></i>
                  <blockquote>"Thời gian và trải nghiệm mua sắm tại shop bán điện thoại luôn mang lại giá trị cao, với sự đa dạng về sản phẩm và dịch vụ chất lượng. Các mẫu điện thoại thông minh tại đây không chỉ có giá trị cao mà còn đáp ứng mọi nhu cầu của khách hàng. Dù bạn đang tìm kiếm một thiết bị mạnh mẽ hay một thiết kế tinh tế, shop luôn sẵn sàng phục vụ với những sản phẩm tốt nhất và dịch vụ tận tâm."</blockquote>
                  <div class="rating">
                    <svg class="star star-fill">
                      <use xlink:href="#star-fill"></use>
                    </svg>
                    <svg class="star star-fill">
                      <use xlink:href="#star-fill"></use>
                    </svg>
                    <svg class="star star-fill">
                      <use xlink:href="#star-fill"></use>
                    </svg>
                    <svg class="star star-half">
                      <use xlink:href="#star-half"></use>
                    </svg>
                    <svg class="star star-empty">
                      <use xlink:href="#star-empty"></use>
                    </svg>
                  </div>
                  <div class="author-detail">
                    <div class="name text-dark text-uppercase pt-2">Võ Thành Nhân</div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide text-center d-flex justify-content-center">
                <div class="review-item col-md-10">
                  <i class="icon icon-review"></i>
                  <blockquote>"Blog của shop bán điện thoại là một ấn phẩm kỹ thuật số có thể bổ sung cho trang web chính hoặc tồn tại độc lập. Blog này bao gồm các bài viết, bài đăng ngắn, danh sách, đồ họa thông tin, video và các nội dung kỹ thuật số khác. Tại đây, bạn có thể tìm thấy những thông tin hữu ích về các mẫu điện thoại mới nhất, mẹo sử dụng hiệu quả, và các bài đánh giá chi tiết giúp bạn lựa chọn sản phẩm phù hợp nhất."</blockquote>
                  <div class="rating">
                    <svg class="star star-fill">
                      <use xlink:href="#star-fill"></use>
                    </svg>
                    <svg class="star star-fill">
                      <use xlink:href="#star-fill"></use>
                    </svg>
                    <svg class="star star-fill">
                      <use xlink:href="#star-fill"></use>
                    </svg>
                    <svg class="star star-fill">
                      <use xlink:href="#star-fill"></use>
                    </svg>
                    <svg class="star star-fill">
                      <use xlink:href="#star-fill"></use>
                    </svg>
                  </div>
                  <div class="author-detail">
                    <div class="name text-dark text-uppercase pt-2">Nguyễn Thùy Duyên</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-icon swiper-arrow swiper-arrow-next position-absolute d-flex align-items-center">
            <svg class="chevron-right">
              <use xlink:href="#chevron-right" />
            </svg>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </section>
@endsection