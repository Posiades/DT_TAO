@extends('user/layout')
@section('title', 'Thanh Toán')
@section('content')
<section class="hero-section position-relative bg-light-blue padding-medium">
    <div class="hero-content">
      <div class="container">
        <div class="row">
          <div class="text-center padding-large no-padding-bottom">
            <h1 class="display-2 text-uppercase text-dark">Thanh Toán</h1>
            <div class="breadcrumbs">
              <span class="item">
                <a href="index.html">Trang Chủ ></a>
              </span>
              <span class="item">Thanh Toán</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="shopify-cart checkout-wrap padding-large">
    <div class="container">
      <form class="form-group">
        <div class="row d-flex flex-wrap">
          <div class="col-lg-6">
            <h2 class="display-7 text-uppercase text-dark pb-4">Chi Tiết Thanh Toán</h2>
            <div class="billing-details">
              <label for="fname">Tên*</label>
              <input type="text" id="fname" name="firstname" class="form-control mt-2 mb-4 ps-3">
              <label for="lname">Họ*</label>
              <input type="text" id="lname" name="lastname" class="form-control mt-2 mb-4 ps-3">
              <label for="cname">Tên công ty (nếu có)*</label>
              <input type="text" id="cname" name="companyname" class="form-control mt-2 mb-4">
              <label for="address">Địa chỉ*</label>
              <input type="text" id="adr" name="address" placeholder="Số nhà và tên đường" class="form-control mt-3 ps-3 mb-3">
              <label for="city">Tỉnh / Thành phố *</label>
              <input type="text" id="city" name="city" class="form-control mt-3 ps-3 mb-4">
              <label for="email">Số Điện thoại *</label>
              <input type="text" id="phone" name="phone" class="form-control mt-2 mb-4 ps-3">
              <label for="email">Địa Chỉ Email *</label>
              <input type="text" id="email" name="email" class="form-control mt-2 mb-4 ps-3">
            </div>
          </div>
          <div class="col-lg-6">
            <h2 class="display-7 text-uppercase text-dark pb-4">Thông Tin</h2>
            <div class="billing-details">
              <label for="fname">Ghi chú đơn hàng (tùy chọn)</label>
              <textarea class="form-control pt-3 pb-3 ps-3 mt-2" placeholder="Ghi chú về đơn đặt hàng của bạn. Giống như những ghi chú đặc biệt khi giao hàng."></textarea>
            </div>
            <div class="your-order mt-5">
              <h2 class="display-7 text-uppercase text-dark pb-4">Tổng giỏ hàng</h2>
              <div class="total-price">
                <table cellspacing="0" class="table">
                  <tbody>
                    <tr class="subtotal border-top border-bottom pt-2 pb-2 text-uppercase">
                      <th>Giá Tổng</th>
                      <td data-title="Subtotal">
                        <span class="price-amount amount text-primary ps-5">
                          <bdi>
                            <span class="price-currency-symbol">2,370.00 </bdi>VNĐ</span>
                        </span>
                      </td>
                    </tr>
                    <tr class="order-total border-bottom pt-2 pb-2 text-uppercase">
                      <th>Tổng Giỏ Hàng</th>
                      <td data-title="Total">
                        <span class="price-amount amount text-primary ps-5">
                          <bdi>
                            <span class="price-currency-symbol">2,370.00 </bdi>VNĐ</span>
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="list-group mt-5 mb-3">
                  <label class="list-group-item d-flex gap-2 border-0">
                    <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios1" value="" checked>
                    <span>
                      <strong class="text-uppercase">Chuyển khoản trực tiếp</strong>
                      <small class="d-block text-body-secondary">Thực hiện thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn. Đơn đặt hàng của bạn sẽ được chuyển đi sau khi tiền đã được xóa trong tài khoản của chúng tôi.</small>
                    </span>
                  </label>
                  <label class="list-group-item d-flex gap-2 border-0">
                    <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios3" value="">
                    <span>
                      <strong class="text-uppercase">Thanh toán khi giao hàng</strong>
                      <small class="d-block text-body-secondary">Thanh toán bằng tiền mặt khi giao hàng.</small>
                    </span>
                  </label>
                  <label class="list-group-item d-flex gap-2 border-0">
                    <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios3" value="">
                    <span>
                      <strong class="text-uppercase">VNPay</strong>
                      <small class="d-block text-body-secondary">Thanh toán qua VNPay; bạn có thể thanh toán bằng thẻ tín dụng nếu bạn không có tài khoản VNPay.</small>
                    </span>
                  </label>
                </div>
                <button type="submit" name="submit" class="btn btn-dark btn-medium text-uppercase btn-rounded-none">Đặt hàng</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection