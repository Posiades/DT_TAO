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
                <a href="index.html">Trang Chủ ></a>
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
        <div class="cart-table">
          <div class="cart-header">
            <div class="row d-flex text-uppercase">
              <h3 class="cart-title col-lg-4 pb-3">Sản Phẩm</h3>
              <h3 class="cart-title col-lg-3 pb-3">Số Lượng</h3>
              <h3 class="cart-title col-lg-4 pb-3">Giá</h3>
            </div>
          </div>
          <div class="cart-item border-top border-bottom padding-small">
            <div class="row align-items-center"> 
              <div class="col-lg-4 col-md-3">
                <div class="cart-info d-flex flex-wrap align-items-center mb-4">
                  <div class="col-lg-5">
                    <div class="card-image">
                      <img src="images/cart-item1.jpg" alt="cloth" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card-detail ps-3">
                      <h3 class="card-title text-uppercase">
                        <a href="#">Iphone 13</a>
                      </h3>
                      <div class="card-price">
                        <span class="money text-primary" data-currency-usd="1200.000 VNĐ">900.000VNĐ</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-7">
                <div class="row d-flex">
                  <div class="col-md-6">
                    <div class="qty-field">
                      <div class="qty-number d-flex">
                        <div class="quntity-button incriment-button">+</div>
                        <input class="spin-number-output bg-light no-margin" type="text" readonly="" value="0">
                        <div class="quntity-button decriment-button">-</div>
                      </div>
                      <div class="regular-price"></div>
                      <div class="quantity-output text-center bg-primary"></div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="total-price">
                      <span class="money text-primary">900.000VNĐ</span>
                    </div>
                  </div>   
                </div>             
              </div>
              <div class="col-lg-1 col-md-2">
                <div class="cart-remove">
                  <a href="#">
                    <svg class="close" width="38px">
                      <use xlink:href="#close"></use>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="cart-item border-top border-bottom padding-small">
            <div class="row align-items-center">
              <div class="col-lg-4 col-md-3">
                <div class="cart-info d-flex flex-wrap align-items-center mb-4">
                  <div class="col-lg-5">
                    <div class="card-image">
                      <img src="images/cart-item2.jpg" alt="cloth" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card-detail">
                      <h3 class="card-title text-uppercase">
                        <a href="#">Pink watch</a>
                      </h3>
                      <div class="card-price">
                        <span class="money text-primary" data-currency-usd="1200.000 VNĐ">870.000VNĐ</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-7">
                <div class="row d-flex">
                  <div class="col-lg-6">
                    <div class="qty-field">
                      <div class="qty-number d-flex">
                        <div class="quntity-button incriment-button">+</div>
                        <input class="spin-number-output bg-light no-margin" type="text" readonly="" value="0">
                        <div class="quntity-button decriment-button">-</div>
                      </div>
                      <div class="regular-price"></div>
                      <div class="quantity-output text-center bg-primary"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="total-price">
                      <span class="money text-primary" >870.000VNĐ</span>
                    </div>
                  </div>   
                </div>             
              </div>
              <div class="col-lg-1 col-md-2">
                <div class="cart-remove">
                  <a href="#">
                    <svg class="close" width="38px">
                      <use xlink:href="#close"></use>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="cart-totals bg-grey padding-medium">
          <h2 class="display-7 text-uppercase text-dark pb-4">Tổng Giỏ Hàng</h2>
          <div class="total-price pb-5">
            <table cellspacing="0" class="table text-uppercase">
              <tbody>
                <tr class="subtotal pt-2 pb-2 border-top border-bottom">
                  <th>Giá Tổng</th>
                  <td data-title="Subtotal">
                    <span class="price-amount amount text-primary ps-5">
                      <bdi>
                        <span class="price-currency-symbol">2,370.00</bdi> VNĐ</span>
                    </span>
                  </td>
                </tr>
                <tr class="order-total pt-2 pb-2 border-bottom">
                  <th>Tổng Giỏ Hàng</th>
                  <td data-title="Total">
                    <span class="price-amount amount text-primary ps-5">
                      <bdi>
                        <span class="price-currency-symbol">2,370.00</bdi> VNĐ</span>
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="button-wrap">
            <button class="btn btn-black btn-medium text-uppercase me-2 mb-3 btn-rounded-none">Cập Nhập Giỏ Hàng</button>
            <button class="btn btn-black btn-medium text-uppercase me-2 mb-3 btn-rounded-none">Tiếp Tục Mua Sắm</button>
            <button class="btn btn-black btn-medium text-uppercase mb-3 btn-rounded-none">Thanh Toán</button>
          </div>
        </div>
      </div>
    </div>
  </section> 
@endsection