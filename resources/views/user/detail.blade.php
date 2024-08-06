@extends('user/layout')
@section('title', 'CHI TIẾT SẢN PHẨM')
@section('content')
 @foreach ($product as $product)
<section id="selling-product" class="single-product padding-xlarge">
  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-6">
        <div class="product-preview mb-3">
          <img src="{{asset($product->image)}}" alt="single-product" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="product-info">
          <div class="element-header">
            <h3 itemprop="name" class="display-7 text-uppercase">{{$product->name}}</h3>
            <div class="rating-container d-flex align-items-center">
              <div class="rating" data-rating="1" onclick=rate(1)>
                <svg class="star star-fill">
                  <use xlink:href="#star-fill"></use>
                </svg>
                <span class="rating-count ps-2">5.2</span>
              </div>
            </div>
          </div>
          <div class="product-price pt-3 pb-3">
            <strong class="text-primary display-6 fw-bold">{{number_format($product->price, 0, ',', '.'). ' VNĐ'}}</strong>
          </div>
          <p>Với sự tinh tế, đồng hồ màu hồng mang lại phong cách thanh lịch và nổi bật. Được thiết kế tỉ mỉ với chất liệu cao cấp, đồng hồ này không chỉ là phụ kiện thời trang mà còn là biểu tượng của sự sang trọng và hiện đại. Khả năng chống nước và độ bền cao, đồng hồ màu hồng là lựa chọn hoàn hảo cho những ai yêu thích sự tinh tế và cá tính.</p>
          <div class="cart-wrap padding-small">
            <div class="color-options product-select">
              <div class="color-toggle" data-option-index="0">
                <h4 class="item-title text-uppercase text-dark text-decoration-underline">Màu:</h4>
                <ul class="select-list list-unstyled d-flex">
                  <li class="select-item pe-3" data-val="Green" title="Green">
                    <a href="#">Trắng</a>
                  </li>
                  <li class="select-item pe-3" data-val="Orange" title="Orange">
                    <a href="#">Đen</a>
                  </li>
                  <li class="select-item pe-3" data-val="Red" title="Red">
                    <a href="#">Đỏ</a>
                  </li>
                  <li class="select-item" data-val="Black" title="Black">
                    <a href="#">Bạc</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="swatch product-select" data-option-index="1">
              <h4 class="item-title text-uppercase text-dark text-decoration-underline">Kích cỡ:</h4>
              <ul class="select-list list-unstyled d-flex">
                <li data-value="S" class="select-item pe-3">
                  <a href="#">XL</a>
                </li>
                <li data-value="M" class="select-item pe-3">
                  <a href="#">L</a>
                </li>
                <li data-value="L" class="select-item pe-3">
                  <a href="#">M</a>
                </li>
                <li data-value="L" class="select-item">
                  <a href="#">S</a>
                </li>
              </ul>
            </div>
            <div class="product-quantity">
              <div class="stock-number text-dark">2 trong kho</div>
              <div class="stock-button-wrap pt-3">

                <div class="input-group product-qty">
                    <span class="input-group-btn">
                        <button type="button" class="quantity-left-minus btn btn-number"  data-type="minus" data-field="">
                          -
                        </button>
                    </span>
                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                    <span class="input-group-btn">
                        <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-field="">
                            +
                        </button>
                    </span>
                </div>
                <div class="qty-button d-flex flex-wrap pt-3">
                  <a href=""><button type="submit" class="btn btn-primary btn-medium text-uppercase me-3 mt-3">Mua Ngay</button></a>
                  <a href="{{ route('cart.add', $product->product_id) }}"><button type="submit" name="add-to-cart" value="1269" class="btn btn-black btn-medium text-uppercase mt-3">Thêm Vào Giỏ Hàng</button></a>                      
                </div>
              </div>
              
            </div>
          </div>
          <div class="meta-product py-2">
            <div class="meta-item d-flex align-items-baseline">
              <h4 class="item-title no-margin pe-2">Mã Hàng:</h4>
              <ul class="select-list list-unstyled d-flex">
                <li data-value="S" class="select-item">1223</li>
              </ul>
            </div>
            <div class="meta-item d-flex align-items-baseline">
              <h4 class="item-title no-margin pe-2">Loại:</h4>
              <ul class="select-list list-unstyled d-flex">
                <li data-value="S" class="select-item">
                  <a href="#">Watch</a>,
                </li>
                <li data-value="S" class="select-item">
                  <a href="#"> Màn hình cảm ứng</a>,
                </li>
              </ul>
            </div>
            <div class="meta-item d-flex align-items-baseline">
              <h4 class="item-title no-margin pe-2">Thẻ:</h4>
              <ul class="select-list list-unstyled d-flex">
                <li data-value="S" class="select-item">
                  <a href="#">Cổ điển</a>,
                </li>
                <li data-value="S" class="select-item">
                  <a href="#"> Hiện đại</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="product-info-tabs">
  <div class="container">
    <div class="row">
      <div class="tabs-listing">
        <nav>
          <div class="nav nav-tabs d-flex flex-wrap justify-content-center" id="nav-tab" role="tablist">
            <button class="nav-link active text-uppercase pe-5" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Miêu tả</button>
            <button class="nav-link text-uppercase pe-5" id="nav-information-tab" data-bs-toggle="tab" data-bs-target="#nav-information" type="button" role="tab" aria-controls="nav-information" aria-selected="false">Thông tin thêm</button>
            <button class="nav-link text-uppercase pe-5" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Đánh giá</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active border-top border-bottom padding-small" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <p>Mô tả Sản phẩm</p>
            <p>{{$product->description }}</p>
            <ul style="list-style-type:disc;" class="list-unstyled ps-4">
              <li>Donec nec justo eget felis facilisis fermentum.</li> 
              <li>Suspendisse urna viverra non, semper suscipit pede.</li>
              <li>Aliquam porttitor mauris sit amet orci.</li>
            </ul> 
            <p>Với sự tinh tế, đồng hồ màu hồng mang lại phong cách thanh lịch và nổi bật. Được thiết kế tỉ mỉ với chất liệu cao cấp, đồng hồ này không chỉ là phụ kiện thời trang mà còn là biểu tượng của sự sang trọng và hiện đại. Khả năng chống nước và độ bền cao, đồng hồ màu hồng là lựa chọn hoàn hảo cho những ai yêu thích sự tinh tế và cá tính.</p>
          </div>
          <div class="tab-pane fade border-top border-bottom padding-small" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
            <ul class="supp">
                @php
                       $lines = explode(",", $product->configtion);
                @endphp
                @foreach($lines as $line)
                <li><span class="bullet">&#10003; </span> {{$line}}</li>
                @endforeach
             </ul>
          </div>
          <div class="tab-pane fade border-top border-bottom padding-small" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
            <div class="review-box d-flex flex-wrap">
              <div class="col-lg-6 d-flex flex-wrap">
                <div class="col-md-2">
                  <div class="image-holder">
                    <img src="images/review-item1.jpg" alt="review" class="img-fluid">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="review-content">
                    <div class="rating-container d-flex align-items-center">
                      <div class="rating" data-rating="1" onclick="rate(1)">
                        <i class="icon icon-star"></i>
                      </div>
                      <div class="rating" data-rating="2" onclick="rate(1)">
                        <i class="icon icon-star"></i>
                      </div>
                      <div class="rating" data-rating="3" onclick="rate(1)">
                        <i class="icon icon-star"></i>
                      </div>
                      <div class="rating" data-rating="4" onclick="rate(1)">
                        <i class="icon icon-star-half"></i>
                      </div>
                      <div class="rating" data-rating="5" onclick="rate(1)">
                        <i class="icon icon-star-empty"></i>
                      </div>
                      <span class="rating-count">(3.5)</span>
                    </div>
                    <div class="review-header">
                      <span class="author-name">Phạm Ngọc Thạch</span>
                      <span class="review-date">– 03/07/2024</span>
                    </div>
                    <p>Sản phẩm thật là tuyệt, đúng là đồ chính hãng, nên mua và sẽ ghé lại.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 d-flex flex-wrap">
                <div class="col-md-2">
                  <div class="image-holder">
                    <img src="images/review-item2.jpg" alt="review" class="img-fluid">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="review-content">
                    <div class="rating-container d-flex align-items-center">
                      <div class="rating" data-rating="1" onclick="rate(1)">
                        <i class="icon icon-star"></i>
                      </div>
                      <div class="rating" data-rating="2" onclick="rate(1)">
                        <i class="icon icon-star"></i>
                      </div>
                      <div class="rating" data-rating="3" onclick="rate(1)">
                        <i class="icon icon-star"></i>
                      </div>
                      <div class="rating" data-rating="4" onclick="rate(1)">
                        <i class="icon icon-star-half"></i>
                      </div>
                      <div class="rating" data-rating="5" onclick="rate(1)">
                        <i class="icon icon-star-empty"></i>
                      </div>
                      <span class="rating-count">(3.5)</span>
                    </div>
                    <div class="review-header">
                      <span class="author-name">Võ Thành Nhân</span>
                      <span class="review-date">– 03/06/2022</span>
                    </div>
                    <p>Sản phẩm thật là tuyệt, đúng là đồ chính hãng, nên mua và sẽ ghé lại.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>
<section id="related-products" class="product-store position-relative padding-large">
  <div class="container">
    <div class="row">
      <div class="display-header d-flex justify-content-between pb-3">
        <h2 class="display-7 text-dark text-uppercase">Những sảm phẩm tương tự</h2>
        <div class="btn-right">
          <a href="shop.html" class="btn btn-medium btn-normal text-uppercase">Tới Sản Phẩm</a>
        </div>
      </div>
      <div class="swiper product-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="images/product-item1.jpg" alt="product-item" class="img-fluid">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <div class="btn-left">
                    <a href="#" class="btn btn-medium btn-black">Thêm vào giỏ hàng</a>
                    <svg class="cart-outline position-absolute">
                      <use xlink:href="#cart-outline"></use>
                    </svg>
                  </div>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">Iphone 10</a>
                </h3>
                <span class="item-price text-primary">$980</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="images/product-item2.jpg" alt="product-item" class="img-fluid">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <div class="btn-left">
                    <a href="#" class="btn btn-medium btn-black">Thêm vào giỏ hàng</a>
                    <svg class="cart-outline position-absolute">
                      <use xlink:href="#cart-outline"></use>
                    </svg>
                  </div>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">Iphone 11</a>
                </h3>
                <span class="item-price text-primary">$1100</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="images/product-item3.jpg" alt="product-item" class="img-fluid">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <div class="btn-left">
                    <a href="#" class="btn btn-medium btn-black">Thêm vào giỏ hàng</a>
                    <svg class="cart-outline position-absolute">
                      <use xlink:href="#cart-outline"></use>
                    </svg>
                  </div>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">Iphone 8</a>
                </h3>
                <span class="item-price text-primary">$780</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="images/product-item4.jpg" alt="product-item" class="product-image">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <div class="btn-left">
                    <a href="#" class="btn btn-medium btn-black">Thêm vào giỏ hàng</a>
                    <svg class="cart-outline position-absolute">
                      <use xlink:href="#cart-outline"></use>
                    </svg>
                  </div>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">Iphone 13</a>
                </h3>
                <span class="item-price text-primary">$1500</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="images/product-item5.jpg" alt="product-item" class="product-image">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <div class="btn-left">
                    <a href="#" class="btn btn-medium btn-black">Thêm vào giỏ hàng</a>
                    <svg class="cart-outline position-absolute">
                      <use xlink:href="#cart-outline"></use>
                    </svg>
                  </div>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">Iphone 12</a>
                </h3>
                <span class="item-price text-primary">$1300</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="swiper-pagination position-absolute text-center"></div>
</section>
          
 @endforeach
@endsection