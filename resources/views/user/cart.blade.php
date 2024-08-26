@extends('user/layout')
@section('title', 'Giỏ Hàng')
@section('content')
<section class="hero-section position-relative bg-light-blue padding-medium">
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="text-center padding-large no-padding-bottom">
                    <h1 class="display-2 text-uppercase text-dark">Giỏ Hàng</h1>
                    <div class="breadcrumbs">
                        <span class="item">
                            <a href="{{ url('/') }}">Trang Chủ ></a>
                        </span>
                        <span class="item">Giỏ Hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shopify-cart padding-large">
    <div class="container">
        <div class="row">
            @if(session('cart'))
            <div class="cart-table">
                <div class="cart-header">
                    <div class="row d-flex text-uppercase">
                        <h3 class="cart-title col-lg-4 pb-3">Sản Phẩm</h3>
                        <h3 class="cart-title col-lg-3 pb-3">Số Lượng</h3>
                        <h3 class="cart-title col-lg-4 pb-3">Giá</h3>
                    </div>
                </div>

                @foreach(session('cart') as $id => $details)
                <div class="cart-item border-top border-bottom padding-small">
                    <div class="row align-items-center"> 
                        <div class="col-lg-4 col-md-3">
                            <div class="cart-info d-flex flex-wrap align-items-center mb-4">
                                <div class="col-lg-5">
                                    <div class="card-image">
                                        <img src="data:image/png;base64,{{ $details['image'] }}" alt="{{ $details['name'] }}" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-detail ps-3">
                                        <h3 class="card-title text-uppercase">
                                            <a href="#">{{ $details['name'] }} {{ $details['storage'] }} {{ $details['color'] }} </a>
                                        </h3>
                                        <div class="card-price">
                                            <span class="money text-primary">{{ number_format($details['price']) }} VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <form action="{{ route('cart.update') }}" method="POST" class="d-flex">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control me-2" style="max-width: 100px;">
                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            </form>
                            <div class="total-price mt-3">
                                <span class="money text-primary">{{ number_format($details['price'] * $details['quantity']) }} VNĐ</span>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-2">
                            <div class="cart-remove">
                                <a href="{{ route('cart.remove', $id) }}">
                                    <svg class="close" width="38px">
                                        <use xlink:href="#close"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="cart-totals bg-grey padding-medium">
                <h2 class="display-7 text-uppercase text-dark pb-4">Tổng Giỏ Hàng</h2>
                <div class="total-price pb-5">
                    <table cellspacing="0" class="table text-uppercase">
                        <tbody>
                            @php
                                $total = 0;
                                foreach(session('cart') as $details) {
                                    $total += $details['price'] * $details['quantity'];
                                }
                            @endphp
                            <tr class="subtotal pt-2 pb-2 border-top border-bottom">
                                <th>Giá Tổng</th>
                                <td data-title="Subtotal">
                                    <span class="price-amount amount text-primary ps-5">
                                        <bdi>{{ number_format($total) }} VNĐ</bdi>
                                    </span>
                                </td>
                            </tr>
                            <tr class="order-total pt-2 pb-2 border-bottom">
                                <th>Tổng Giỏ Hàng</th>
                                <td data-title="Total">
                                    <span class="price-amount amount text-primary ps-5">
                                        <bdi>{{ number_format($total) }} VNĐ</bdi>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="button-wrap">
                    <a href="{{ route('index') }}" class="btn btn-black btn-medium text-uppercase me-2 mb-3 btn-rounded-none">Tiếp Tục Mua Hàng</a>
                    <a class="btn btn-black btn-medium text-uppercase me-2 mb-3 btn-rounded-none" href="{{ route('checkout') }}">Thanh Toán</a>
                </div>
            </div>
            @else
            <p>Giỏ hàng của bạn đang trống.</p>
            @endif
        </div>
    </div>
</section>
@endsection
