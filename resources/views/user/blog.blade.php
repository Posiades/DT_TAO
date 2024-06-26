@extends('user/layout')
@section('title', 'Tin Tức')
@section('content')
<section class="hero-section position-relative bg-light-blue padding-medium">
    <div class="hero-content">
      <div class="container">
        <div class="row">
          <div class="text-center padding-large no-padding-bottom">
            <h1 class="display-2 text-uppercase text-dark">Tin Tức</h1>
            <div class="breadcrumbs">
              <span class="item">
                <a href="index.html">Trang Chủ ></a>
              </span>
              <span class="item">Tinh Tức</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="post-grid padding-large">
    <div class="container">
      <div class="row d-flex flex-wrap">
        <aside class="col-md-3">
          <div class="sidebar">
            <div class="widget-search-bar">
              <form role="search" method="get" class="d-flex">
                <input class="search-field" placeholder="Search" type="search">
                <div class="search-icon bg-dark">
                  <a href="#">
                    <svg class="search content-light">
                      <use xlink:href="#search"></use>
                    </svg>
                  </a>
                </div>
              </form>
            </div>
            <div class="sidebar-filter pt-5">
              <div class="widget sidebar-product-categories mb-5">
                <h5 class="widget-title text-uppercase">Lọc Theo Sản Phẩm</h5>
                <ul class="product-categories sidebar-list list-unstyled">
                  <li class="cat-item">
                    <a href="/collections/categories">Tất Cả</a>
                  </li>
                  <li class="cat-item">
                    <a href="">iPhone</a>
                  </li>
                  <li class="cat-item">
                    <a href="">Mac</a>
                  </li>
                  <li class="cat-item">
                    <a href="">iPad</a>
                  </li>
                  <li class="cat-item">
                    <a href="">Watch</a>
                  </li>
                  <li class="cat-item">
                    <a href="">AirPods</a>
                  </li>
                </ul>
              </div>
              <div class="widget sidebar-recent-post mb-5">
                <h5 class="widget-title text-uppercase">Bài Viết Mới Nhất</h5>
                <div class="sidebar-post-item">
                  <div class="d-flex flex-wrap align-items-center mb-3">
                    <div class="col-lg-6">
                      <div class="card-image pe-3 pb-2">
                        <a href="#">
                          <img src="images/post-small-image1.jpg" alt="blog" class="img-fluid">
                        </a>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="card-content">
                        <h4 class="card-title">
                          <a href="#">Apple The Exchange TRX hiện đã khai trương tại Kuala Lumpur</a>
                        </h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="sidebar-post-item">
                  <div class="d-flex flex-wrap align-items-center mb-3">
                    <div class="col-lg-6">
                      <div class="card-image pe-3 pb-2">
                        <a href="#">
                          <img src="images/post-small-image2.jpg" alt="blog" class="img-fluid">
                        </a>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="card-content">
                        <h4 class="card-title">
                          <a href="#">Các phiên bản mới của Final Cut Pro dành cho iPad và Mac ra mắt hôm nay</a>
                        </h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="sidebar-post-item">
                  <div class="d-flex flex-wrap align-items-center mb-3">
                    <div class="col-lg-6">
                      <div class="card-image pe-3 pb-2">
                        <a href="#">
                          <img src="images/post-small-image3.jpg" alt="blog" class="img-fluid">
                        </a>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="card-content">
                        <h4 class="card-title">
                          <a href="#">Apple The Exchange TRX sẽ chào đón những khách hàng đầu tiên vào Thứ Bảy, ngày 22 tháng 6, tại Kuala Lumpur</a>
                        </h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="widget sidebar-social-links mb-5">
                <h5 class="widget-title text-uppercase">Social Links</h5>
                <ul class="sidebar-list list-unstyled">
                  <li class="tags-item">
                    <a href="">Facebook</a>
                  </li>
                  <li class="tags-item">
                    <a href="">Instagram</a>
                  </li>
                  <li class="tags-item">
                    <a href="">Twitter</a>
                  </li>
                  <li class="tags-item">
                    <a href="">Pinterest</a>
                  </li>
                  <li class="tags-item">
                    <a href="">Youtube</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </aside>
        <main class="col-md-9">
          <div class="row">
            <div class="col-lg-4">
              <div class="card border-none">
                <div class="card-image">
                  <img src="images/post-item1.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">feb 22, 2023</span>
                  <span class="meta-category">- Gadgets</span>
                </div>
                <h3 class="card-title">
                  <a href="#">Get some cool gadgets in 2023</a>
                </h3>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card border-none">
                <div class="card-image">
                  <img src="images/post-item3.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">feb 22, 2023</span>
                  <span class="meta-category">- camera</span>
                </div>
                <h3 class="card-title">
                  <a href="#">toP 10 SMALL cAMERA IN THE WORLD</a>
                </h3>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card border-none">
                <div class="card-image">
                  <img src="images/post-item2.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">feb 25, 2023</span>
                  <span class="meta-category">- technology</span>
                </div>
                <h3 class="card-title">
                  <a href="#">TECHNOLOGY HACK YOU WON’T GET</a>
                </h3>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card border-none">
                <div class="card-image">
                  <img src="images/post-item4.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">feb 27, 2023</span>
                  <span class="meta-category">- technology</span>
                </div>
                <h3 class="card-title">
                  <a href="#">Get some cool gadgets in 2023</a>
                </h3>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card border-none">
                <div class="card-image">
                  <img src="images/post-item5.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">March 09, 2023</span>
                  <span class="meta-category">- technology</span>
                </div>
                <h3 class="card-title">
                  <a href="#">TECHNOLOGY HACK YOU WON’T GET</a>
                </h3>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card border-none">
                <div class="card-image">
                  <img src="images/post-item6.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">March 09, 2023</span>
                  <span class="meta-category">- Gadget</span>
                </div>
                <h3 class="card-title">
                  <a href="#">TOP 10 Gadget IN THE WORLD</a>
                </h3>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card border-none">
                <div class="card-image">
                  <img src="images/post-item7.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">March 14, 2023</span>
                  <span class="meta-category">- Gadget</span>
                </div>
                <h3 class="card-title">
                  <a href="#">Get some cool gadgets in 2023</a>
                </h3>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card border-none">
                <div class="card-image">
                  <img src="images/post-item8.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">March 18, 2023</span>
                  <span class="meta-category">- Gadget</span>
                </div>
                <h3 class="card-title">
                  <a href="#">TECHNOLOGY HACK YOU WON’T GET</a>
                </h3>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card border-none">
                <div class="card-image">
                  <img src="images/post-item9.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">March 22, 2023</span>
                  <span class="meta-category">- Gadget</span>
                </div>
                <h3 class="card-title">
                  <a href="#">TECHNOLOGY HACK YOU WON’T GET</a>
                </h3>
              </div>
            </div>
          </div>
          <nav class="navigation paging-navigation text-center padding-medium" role="navigation">
            <div class="pagination loop-pagination d-flex justify-content-center align-items-center">
              <a href="#">
                <svg class="chevron-left pe-3">
                  <use xlink:href="#chevron-left"></use>
                </svg>
              </a>
              <span aria-current="page" class="page-numbers current pe-3">1</span>
              <a class="page-numbers pe-3" href="#">2</a>
              <a class="page-numbers pe-3" href="#">3</a>
              <a class="page-numbers pe-3" href="#">4</a>
              <a class="page-numbers" href="#">5</a>
              <a href="#">
                <svg class="chevron-right ps-3">
                  <use xlink:href="#chevron-right"></use>
                </svg>
              </a>
            </div>
          </nav>
        </main>
      </div>
    </div>
  </section>
@endsection