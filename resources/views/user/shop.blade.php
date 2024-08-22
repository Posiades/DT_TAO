@extends('user/layout')
@section('title', 'Sản Phẩm')
@section('content')

<section class="hero-section position-relative bg-light-blue padding-medium">
    <div class="hero-content">
      <div class="container">
        <div class="row">
          <div class="text-center padding-large no-padding-bottom">
            <h1 class="display-2 text-uppercase text-dark">Sản Phẩm</h1>
            <div class="breadcrumbs">
              <span class="item">
                <a href="index.html">Trang chủ ></a>
              </span>
              <span class="item">Sản phẩm</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="shopify-grid padding-large">
    <div class="container">
      <div class="row">
        <main class="col-md-9">
          <div class="filter-shop d-flex justify-content-between">
            <div class="showing-product">
              <p>Hiển thị 1–9 trên 55 kết quả </p>
            </div>
            <div class="sort-by">
              <select id="input-sort" class="form-control" onchange="location = this.value;">
                 <!-- Option để không lọc -->
                 <option value="{{ route('products.filter', array_merge(request()->except('sort'), ['sort' => '', 'slug' => request()->slug])) }}">Phân Loại</option>

                <!-- Các tùy chọn sắp xếp -->
                <option value="{{ route('products.filter',  array_merge(request()->except('sort'), ['sort' => 'name_asc',  'slug' => request()->slug]))  }}">Tên (A - Z)</option>
                <option value="{{ route('products.filter',  array_merge(request()->except('sort'), ['sort' => 'name_desc', 'slug' => request()->slug])) }}">Tên (Z - A)</option>
                <option value="{{ route('products.filter',  array_merge(request()->except('sort'), ['sort' => 'price_asc', 'slug' => request()->slug])) }}">Giá (Thấp-Cao)</option>
                <option value="{{ route('products.filter',  array_merge(request()->except('sort'), ['sort' => 'price_desc', 'slug' => request()->slug])) }}">Giá (Cao-Thấp)</option>
                <option value="{{ route('products.filter',  array_merge(request()->except('sort'), ['sort' => 'sales_desc', 'slug' => request()->slug])) }}">Bán chạy (Cao Nhất)</option>
                <option value="{{ route('products.filter',  array_merge(request()->except('sort'), ['sort' => 'sales_asc', 'slug' => request()->slug])) }}">Bán chạy (Thấp Nhất)</option>
            </select>
            
          </div>
          </div>
          
          <div class="product-content product-store d-flex justify-content-between flex-wrap">
            @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="product-card position-relative pe-3 pb-3">
                    <div class="image-holder">
                        <img src="data:image/png;base64,{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
                    </div>
                    <div class="cart-concern position-absolute">
                        <div class="cart-button d-flex">
                            <div class="btn-left">
                                <a href="{{ route('cart.add', $product->product_id) }}" class="btn btn-medium btn-black">Thêm vào giỏ hàng</a>
                                <svg class="cart-outline position-absolute">
                                    <use xlink:href="#cart-outline"></use>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="card-detail d-flex justify-content-between pt-3 pb-3">
                        <h3 class="card-title text-uppercase">
                            <a href="{{ route('detail', ['slug'=>$product->slug]) }}">{{ $product->name }} {{ $product->color }} {{ $product->storage }}</a>
                        </h3>
                    </div>   
                    
                    
                    <h5 class="item-price text-primary">{{ number_format($product->price, 0, ',', '.') . ' VNĐ' }}</h5>
                </div>                  
            </div>
            @endforeach
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
        <aside class="col-md-3">
          <div class="sidebar">

            <div class="widget-menu">
              <div class="widget-search-bar">
                  <form role="search" method="get" action="{{ route('products.filter', ['slug' => 'all']) }}" class="d-flex">
                      <input class="search-field" placeholder="Search" type="search" name="keyword" value="{{ request('keyword') }}">
                      <div class="search-icon bg-dark">
                          <button type="submit" class="btn btn-dark">
                              <svg class="search text-light">
                                  <use xlink:href="#search"></use>
                              </svg>
                          </button>
                      </div>
                  </form>
              </div> 
          </div>

            <div class="widget-product-categories pt-5">
              <h5 class="widget-title text-decoration-underline text-uppercase">Lọc Theo Sản Phẩm</h5>
              <ul class="product-categories sidebar-list list-unstyled">
                <li class="cat-item">
                    <a href="{{ route('products.filter', ['slug' => 'all']) }}">Tất cả</a>
                </li>
                <li class="cat-item">
                    <a href="{{ route('products.filter', ['slug' => 'iphone']) }}">iPhone</a>
                </li>
                <li class="cat-item">
                    <a href="{{ route('products.filter', ['slug' => 'macbook']) }}">Mac</a>
                </li>
                <li class="cat-item">
                    <a href="{{ route('products.filter', ['slug' => 'ipad']) }}">iPad</a>
                </li>
                <li class="cat-item">
                    <a href="{{ route('products.filter', ['slug' => 'watch']) }}">Watch</a>
                </li>
                <li class="cat-item">
                    <a href="{{ route('products.filter', ['slug' => 'airpods']) }}">AirPods</a>
                </li>
            </ul>
            
            </div>
            <div class="widget-price-filter pt-3">
              <h5 class="widget-titlewidget-title text-decoration-underline text-uppercase">Lọc Theo Giá</h5>
              <ul class="product-tags sidebar-list list-unstyled">
                  <li class="tags-item">
                      <a href="{{ route('products.filter', ['price_range' => 'less_than_5000000', 'slug' => request()->slug]) }}">Ít hơn 5.000.000</a>
                  </li>
                  <li class="tags-item">
                      <a href="{{ route('products.filter', ['price_range' => 'less_than_10000000', 'slug' => request()->slug]) }}">Ít hơn 10.000.000</a>
                  </li>
                  <li class="tags-item">
                      <a href="{{ route('products.filter', ['price_range' => 'less_than_20000000', 'slug' => request()->slug]) }}">Ít hơn 20.000.000</a>
                  </li>
                  <li class="tags-item">
                      <a href="{{ route('products.filter', ['price_range' => 'less_than_30000000', 'slug' => request()->slug]) }}">Ít hơn 30.000.000</a>
                  </li>
              </ul>
          </div>

          </div>
        </aside>
      </div>
    </div>
  </div>
@endsection