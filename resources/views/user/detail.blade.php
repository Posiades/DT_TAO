@extends('user/layout')

@section('title', 'CHI TIẾT SẢN PHẨM')

@section('content')
    @foreach ($product as $productItem)  <!-- Changed $product to $productItem to avoid confusion -->
    <section id="selling-product" class="single-product padding-xlarge">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="product-preview mb-3">
                        <img src="data:image/png;base64,{{ $productItem->image }}" alt="single-product" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-info">
                        <div class="element-header">
                            <h3 itemprop="name" class="display-7 text-uppercase">{{ $productItem->name }} {{ $productItem->color }} {{ $productItem->storage }}</h3>
                        </div>
                        <div class="product-price pt-3 pb-3">
                            <strong class="text-primary display-6 fw-bold">{{ number_format($productItem->price, 0, ',', '.') }} VNĐ</strong>
                        </div>
    
                        <div class="cart-wrap padding-small">
                            <div class="color-options product-select"></div>
                            <div class="product-quantity">
                                <div class="stock-number text-dark">{{ $productItem->quantity }} trong kho</div>
                                
                                @if($productItem->quantity > 0)
                                    <div class="stock-button-wrap pt-3">
                                        <div class="input-group product-qty">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-left-minus btn btn-number" data-type="minus" data-field="">
                                                    -
                                                </button>
                                            </span>
                                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="{{ $productItem->quantity }}">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-field="">
                                                    +
                                                </button>
                                            </span>
                                        </div>
                                        <div class="qty-button d-flex flex-wrap pt-3">
                                            <a href="{{ route('cart.add', $productItem->product_id) }}"><button type="submit" class="btn btn-primary btn-medium text-uppercase me-3 mt-3">Mua Ngay</button></a>
                                            <a href="{{ route('cart.add', $productItem->product_id) }}"><button type="submit" name="add-to-cart" value="1269" class="btn btn-black btn-medium text-uppercase mt-3">Thêm Vào Giỏ Hàng</button></a>
                                        </div>
                                    </div>
                                @else
                                    <div class="stock-status text-danger pt-3">
                                        <strong>Hết hàng</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="meta-product py-2">
                            <div class="meta-item d-flex align-items-baseline">
                                <h4 class="item-title no-margin pe-2">Mã Hàng:</h4>
                                <ul class="select-list list-unstyled d-flex">
                                    <li data-value="S" class="select-item">{{ $productItem->product_id }}</li>
                                </ul>
                            </div>
                            <div class="meta-item d-flex align-items-baseline">
                                <h4 class="item-title no-margin pe-2">Màu:</h4>
                                <ul class="select-list list-unstyled d-flex">
                                    <li data-value="S" class="select-item">
                                       {{ $productItem->color }}
                                    </li>
                                </ul>
                            </div>
                            <div class="meta-item d-flex align-items-baseline">
                                <h4 class="item-title no-margin pe-2">Bộ Nhớ:</h4>
                                <ul class="select-list list-unstyled d-flex">
                                    <li data-value="S" class="select-item">
                                        {{ $productItem->storage }}
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
                                <p>{{ $productItem->description }}</p>
                            </div>
                            <div class="tab-pane fade border-top border-bottom padding-small" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
                                <ul class="supp">
                                    @php
                                        $lines = explode(",", $productItem->configtion);
                                    @endphp
                                    @foreach($lines as $line)
                                        <li><span class="bullet">&#10003; </span> {{ $line }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-pane fade border-top border-bottom padding-small" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                                <div class="review-box d-flex flex-wrap">
                                    <div class="col-lg-6 d-flex flex-wrap">
                                        <div class="col-md-2">
                                            <div class="image-holder">
                                                @if ($productItem->full_name != null)
                                                <img src="data:image/png;base64,{{ $productItem->image }}" alt="review" class="img-fluid"> 
                                                @else
                                                    <span>Chưa có đánh giá cho sản phẩm này</span>
                                                @endif
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
                                                    <span class="rating-count">{{$productItem->start}}</span>
                                                </div>
                                                <div class="review-header">
                                                    <span class="author-name">{{$productItem->full_name}}</span>
                                                    <span class="review-date">
                                                      {{ $productItem->created_at ? $productItem->created_at : '' }}
                                                  </span>                                                  
                                                </div>
                                                <p>{{$productItem->content}}</p>
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
                        <h2 class="display-7 text-dark text-uppercase">Những sản phẩm tương tự</h2>
                    </div>
                    <div class="swiper product-swiper">
                        <div class="swiper-wrapper">
                            @foreach ($recomment as $recommendedProduct)
                                <div class="swiper-slide">
                                    <div class="product-card position-relative">
                                        <div class="image-holder">
                                            <img src="data:image/png;base64,{{ $recommendedProduct->image }}" alt="product-item" class="img-fluid">
                                        </div>
                                        <div class="cart-concern position-absolute">
                                            <div class="cart-button d-flex">
                                                <div class="btn-left">
                                                    <a href="{{ route('cart.add', $recommendedProduct->product_id) }}" class="btn btn-medium btn-black">Thêm vào giỏ hàng</a>
                                                    <svg class="cart-outline position-absolute">
                                                        <use xlink:href="#cart-outline"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                            <h3 class="card-title text-uppercase">
                                                <a href="{{url("/chi-tiet/$recommendedProduct->slug")}}">{{ $recommendedProduct->name }} {{ $recommendedProduct->color }} {{ $recommendedProduct->storage }}</a>
                                            </h3>
                                            <span class="item-price text-primary">{{ number_format($recommendedProduct->price, 0, ',', '.') }} VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-pagination position-absolute text-center"></div>
                </div>
            </div>
        </section>
    @endforeach
@endsection
