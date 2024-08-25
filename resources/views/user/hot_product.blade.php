@extends('user/layout')
@section('title', 'Sản Phẩm')
@section('content')

<section class="hero-section position-relative bg-light-blue padding-medium">
    <div class="hero-content">
      <div class="container">
        <div class="row">
          <div class="text-center padding-large no-padding-bottom">
            <h1 class="display-2 text-uppercase text-dark">Sản Phẩm Bán Chạy</h1>
            <div class="breadcrumbs">
              <span class="item">
                <a href="index.html">Trang chủ ></a>
              </span>
              <span class="item">Sản phẩm bán chạy</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="shopify-grid padding-large">
    <div class="container">
      <div class="row justify-content-center">
        <main class="col-md-9">
          <div class="product-content product-store d-flex flex-wrap justify-content-center">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                    <div class="product-card position-relative pe-3 pb-3">
                        <div class="image-holder">
                            <img src="data:image/png;base64,{{ $product->image}}" alt="{{ $product->name }}" class="img-fluid">
                        </div>
                        <div class="cart-concern position-absolute">
                          <div class="cart-button d-flex">
                              <div class="btn-left">
                                  <a href="{{ route('cart.add', $product->product_id) }}" class="btn btn-medium btn-black">Thêm vào giỏ hàng</a>
                              </div>
                          </div>
                      </div>
                      <div class="card-detail d-flex justify-content-between pt-3 pb-3">
                          <h5 class="card-title text-uppercase">
                              <a href="{{ route('detail', ['slug'=>$product->slug]) }}">{{ $product->name }} {{ $product->color }} {{ $product->storage }}</a>
                          </h5>
                      </div>
                      <h5 class="item-price text-primary">{{ number_format($product->price, 0, ',', '.') . ' VNĐ' }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
          <div class="pagination justify-content-center">{{ $products->links() }}</div>
        </main>
      </div>
    </div>
  </div>
@endsection
