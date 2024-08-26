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

@if (Session::has('user'))
<section class="shopify-cart checkout-wrap padding-large">
    <div class="container">
        <form id="checkout-form" action="{{ url('/vnpay_payment') }}" method="POST">
            @csrf
            <div class="row d-flex flex-wrap">
                <div class="col-lg-6">
                    <h2 class="display-7 text-uppercase text-dark pb-4">Chi Tiết Thanh Toán</h2>
                    <div class="billing-details">
                        <label for="fname">Tên*</label>
                        <input type="text" id="fname" name="firstname" class="form-control mt-2 mb-4 ps-3" value="{{Session::get('user')->full_name}}" required>
                        <label for="cname">Tên công ty (nếu có)*</label>
                        <input type="text" id="cname" name="companyname" class="form-control mt-2 mb-4">
                        <label for="address">Địa chỉ*</label>
                        <input type="text" id="address" name="address" placeholder="Số nhà và tên đường" class="form-control mt-3 ps-3 mb-3" value="{{Session::get('user')->address}}" required>
                        <label for="city">Tỉnh / Thành phố *</label>
                        <input type="text" id="city" name="city" class="form-control mt-3 ps-3 mb-4" required>
                        <label for="phone">Số Điện thoại *</label>
                        <input type="text" id="phone" name="phone" class="form-control mt-2 mb-4 ps-3" value="{{Session::get('user')->phone}}" required>
                        <label for="email">Địa Chỉ Email *</label>
                        <input type="email" id="email" name="email" class="form-control mt-2 mb-4 ps-3" value="{{Session::get('user')->email}}" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="display-7 text-uppercase text-dark pb-4">Thông Tin</h2>
                    <div class="billing-details">
                        <label for="note">Ghi chú đơn hàng (tùy chọn)</label>
                        <textarea id="note" class="form-control pt-3 pb-3 ps-3 mt-2" name="note" placeholder="Ghi chú về đơn đặt hàng của bạn. Giống như những ghi chú đặc biệt khi giao hàng."></textarea>
                        <label for="voucher" class="mt-4">Mã giảm giá (nếu có)</label>
                        <input type="text" id="voucher" name="voucher" class="form-control mt-2 mb-4" placeholder="Nhập mã giảm giá">
                        <div id="voucher-message" class="text-success mt-2"></div>
                    </div>
                    <div class="your-order mt-5">
                        <h2 class="display-7 text-uppercase text-dark pb-4">Tổng giỏ hàng</h2>
                        <div class="total-price">
                            <table cellspacing="0" class="table">
                                <tbody>
                                    @php
                                        $total = 0;
                                        foreach(session('cart') as $details) {
                                            $total += $details['price'] * $details['quantity'];
                                        }
                                    @endphp
                                    <tr class="subtotal border-top border-bottom pt-2 pb-2 text-uppercase">
                                        <th>Giá Tổng</th>
                                        <td data-title="Subtotal">
                                            <span class="price-amount amount text-primary ps-5" id="total-price">
                                                <bdi>{{ number_format($total) }} VNĐ</bdi>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="order-total border-bottom pt-2 pb-2 text-uppercase">
                                        <th>Tổng Giỏ Hàng</th>
                                        <td data-title="Total">
                                            <span class="price-amount amount text-primary ps-5" id="order-total">
                                                <bdi>{{ number_format($total) }} VNĐ</bdi>
                                                <input type="hidden" name="total_voucher" class="totall">
                                                <input type="hidden" name="code_voucher", class="code_voucher">
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="list-group mt-5 mb-3">
                                <label class="list-group-item d-flex gap-2 border-0">
                                    <input class="form-check-input flex-shrink-0" type="radio" name="payment_method" value="bank_transfer" checked>
                                    <span>
                                        <strong class="text-uppercase">Chuyển khoản trực tiếp</strong>
                                        <small class="d-block text-body-secondary">Thực hiện thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn. Đơn đặt hàng của bạn sẽ được chuyển đi sau khi tiền đã được xóa trong tài khoản của chúng tôi.</small>
                                    </span>
                                </label>
                                <label class="list-group-item d-flex gap-2 border-0">
                                    <input class="form-check-input flex-shrink-0" type="radio" name="payment_method" value="cod">
                                    <span>
                                        <strong class="text-uppercase">Thanh toán khi giao hàng</strong>
                                        <small class="d-block text-body-secondary">Thanh toán bằng tiền mặt khi giao hàng.</small>
                                    </span>
                                </label>
                                <label class="list-group-item d-flex gap-2 border-0">
                                    <input class="form-check-input flex-shrink-0" type="radio" name="payment_method" value="vnpay">
                                    <span>
                                        <strong class="text-uppercase">VNPay</strong>
                                        <small class="d-block text-body-secondary">Thanh toán qua VNPay; bạn có thể thanh toán bằng thẻ tín dụng nếu bạn không có tài khoản VNPay.</small>
                                    </span>
                                </label>
                            </div>
                            <input type="hidden" id="giatong" name="giatong" value="{{ $total }}">
                            <button type="submit" name="redirect" class="btn btn-dark btn-medium text-uppercase btn-rounded-none">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@else
<section class="shopify-cart checkout-wrap padding-large">
    <div class="container">
        <form id="checkout-form" action="{{ url('/vnpay_payment') }}" method="POST">
            @csrf
            <div class="row d-flex flex-wrap">
                <div class="col-lg-6">
                    <h2 class="display-7 text-uppercase text-dark pb-4">Chi Tiết Thanh Toán</h2>
                    <div class="billing-details">
                        <label for="fname">Tên*</label>
                        <input type="text" id="fname" name="firstname" class="form-control mt-2 mb-4 ps-3" required>
                        <label for="lname">Họ*</label>
                        <input type="text" id="lname" name="lastname" class="form-control mt-2 mb-4 ps-3" required>
                        <label for="cname">Tên công ty (nếu có)*</label>
                        <input type="text" id="cname" name="companyname" class="form-control mt-2 mb-4">
                        <label for="address">Địa chỉ*</label>
                        <input type="text" id="address" name="address" placeholder="Số nhà và tên đường" class="form-control mt-3 ps-3 mb-3" required>
                        <label for="city">Tỉnh / Thành phố *</label>
                        <input type="text" id="city" name="city" class="form-control mt-3 ps-3 mb-4" required>
                        <label for="phone">Số Điện thoại *</label>
                        <input type="text" id="phone" name="phone" class="form-control mt-2 mb-4 ps-3" required>
                        <label for="email">Địa Chỉ Email *</label>
                        <input type="email" id="email" name="email" class="form-control mt-2 mb-4 ps-3" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="display-7 text-uppercase text-dark pb-4">Thông Tin</h2>
                    <div class="billing-details">
                        <label for="note">Ghi chú đơn hàng (tùy chọn)</label>
                        <textarea id="note" class="form-control pt-3 pb-3 ps-3 mt-2" name="note" placeholder="Ghi chú về đơn đặt hàng của bạn. Giống như những ghi chú đặc biệt khi giao hàng."></textarea>
                        <label for="voucher" class="mt-4">Mã giảm giá (nếu có)</label>
                        <input type="text" id="voucher" name="voucher" class="form-control mt-2 mb-4" placeholder="Nhập mã giảm giá">
                        <div id="voucher-message" class="text-success mt-2"></div>
                    </div>
                    <div class="your-order mt-5">
                        <h2 class="display-7 text-uppercase text-dark pb-4">Tổng giỏ hàng</h2>
                        <div class="total-price">
                            <table cellspacing="0" class="table">
                                <tbody>
                                    @php
                                        $total = 0;
                                        foreach(session('cart') as $details) {
                                            $total += $details['price'] * $details['quantity'];
                                        }
                                    @endphp
                                    <tr class="subtotal border-top border-bottom pt-2 pb-2 text-uppercase">
                                        <th>Giá Tổng</th>
                                        <td data-title="Subtotal">
                                            <span class="price-amount amount text-primary ps-5" id="total-price">
                                                <bdi>{{ number_format($total) }} VNĐ</bdi>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="order-total border-bottom pt-2 pb-2 text-uppercase">
                                        <th>Tổng Giỏ Hàng</th>
                                        <td data-title="Total">
                                            <span class="price-amount amount text-primary ps-5" id="order-total">
                                                <bdi>{{ number_format($total) }} VNĐ</bdi>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="list-group mt-5 mb-3">
                                <label class="list-group-item d-flex gap-2 border-0">
                                    <input class="form-check-input flex-shrink-0" type="radio" name="payment_method" value="bank_transfer" checked>
                                    <span>
                                        <strong class="text-uppercase">Chuyển khoản trực tiếp</strong>
                                        <small class="d-block text-body-secondary">Thực hiện thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn. Đơn đặt hàng của bạn sẽ được chuyển đi sau khi tiền đã được xóa trong tài khoản của chúng tôi.</small>
                                    </span>
                                </label>
                                <label class="list-group-item d-flex gap-2 border-0">
                                    <input class="form-check-input flex-shrink-0" type="radio" name="payment_method" value="cod">
                                    <span>
                                        <strong class="text-uppercase">Thanh toán khi giao hàng</strong>
                                        <small class="d-block text-body-secondary">Thanh toán bằng tiền mặt khi giao hàng.</small>
                                    </span>
                                </label>
                                <label class="list-group-item d-flex gap-2 border-0">
                                    <input class="form-check-input flex-shrink-0" type="radio" name="payment_method" value="vnpay">
                                    <span>
                                        <strong class="text-uppercase">VNPay</strong>
                                        <small class="d-block text-body-secondary">Thanh toán qua VNPay; bạn có thể thanh toán bằng thẻ tín dụng nếu bạn không có tài khoản VNPay.</small>
                                    </span>
                                </label>
                            </div>
                            <input type="hidden" id="giatong" name="giatong" value="{{ $total }}">
                            <button type="submit" name="redirect" class="btn btn-dark btn-medium text-uppercase btn-rounded-none">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endif

@section('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const voucherInput = document.getElementById('voucher');
    const voucherMessage = document.getElementById('voucher-message');
    const totalPriceElement = document.getElementById('total-price');
    const orderTotalElement = document.getElementById('order-total');
    var giatongInput2 = document.querySelector('.totall');
    const giatongInput = document.getElementById('giatong');
    var code_voucher = document.querySelector('.code_voucher');

    let originalTotal = parseFloat(totalPriceElement.textContent.replace(/[^0-9]/g, ''));

    voucherInput.addEventListener('input', debounce(checkVoucher, 500));

    function debounce(func, delay) {
        let timer;
        return function() {
            clearTimeout(timer);
            timer = setTimeout(() => func.apply(this, arguments), delay);
        };
    }

    async function checkVoucher() {
        const voucherCode = voucherInput.value.trim();
        if (voucherCode.length > 0) {
            try {
                const response = await fetch('/check-voucher', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ voucherCode })
                });
                const data = await response.json();
                if (data.valid) {
                    applyDiscount(data.discount);
                    voucherMessage.textContent = 'Mã giảm giá hợp lệ!';
                    voucherMessage.className = 'text-success mt-2';
                } else {
                    resetDiscount();
                    voucherMessage.textContent = 'Mã giảm giá không hợp lệ.';
                    voucherMessage.className = 'text-danger mt-2';
                }
            } catch (error) {
                console.error('Lỗi khi kiểm tra voucher:', error);
                resetDiscount();
                voucherMessage.textContent = 'Đã xảy ra lỗi. Vui lòng thử lại.';
                voucherMessage.className = 'text-danger mt-2';
            }
        } else {
            resetDiscount();
            voucherMessage.textContent = '';
        }
    }

    function applyDiscount(discount) {
        const currentTotal = originalTotal;
        const discountedTotal = Math.max(currentTotal - discount, 0);
        updateTotals(discountedTotal);
    }

    function resetDiscount() {
        updateTotals(originalTotal);
    }

    function updateTotals(newTotal) {
        const formattedTotal = new Intl.NumberFormat('vi-VN').format(newTotal);
        orderTotalElement.querySelector('bdi').textContent = `${formattedTotal} VNĐ`;
        giatongInput.value = newTotal; // Cập nhật giá trị tổng mới vào hidden input
        giatongInput2.value = newTotal; // Cập nhật giá trị tổng mới vào hidden input
        
        // Gán giá trị mã voucher vào hidden input
        code_voucher.value = voucherInput.value;
        
        console.log("Updated hidden input value: ", giatongInput.value); // Debugging line
    }
});

</script>

    
@endsection
