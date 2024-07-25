@extends('admin/layout')
@section('title', 'Thêm Đơn hàng')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Thêm Đơn Hàng</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group">
                            <label for="user_id">User ID (nếu có)</label>
                            <input type="text" class="form-control" id="user_id" name="user_id">
                        </div>

                        <div class="form-group mt-2">
                            <label for="guest_id">Guest ID</label>
                            <input type="text" class="form-control" id="guest_id" name="guest_id">
                        </div>

                        <div class="form-group mt-2">
                            <label for="order_date">Ngày đặt hàng</label>
                            <input type="date" class="form-control" id="order_date" name="order_date">
                        </div>

                        <div class="form-group mt-2">
                            <label for="status">Trạng thái</label>
                            <input type="text" class="form-control" id="status" name="status">
                        </div>

                        <!-- Các chi tiết đơn hàng -->
                        <div class="form-group mt-2">
                            <label for="products">Chi tiết đơn hàng</label>

                            <!-- Ví dụ đơn giản để thêm sản phẩm -->
                            <div class="product">
                                <input type="text" class="form-control mb-2" name="products[0][product_id]" placeholder="ID sản phẩm">
                                <input type="text" class="form-control mb-2" name="products[0][option_id]" placeholder="ID tùy chọn">
                                <input type="text" class="form-control mb-2" name="products[0][quantity]" placeholder="Số lượng">
                                <input type="text" class="form-control mb-2" name="products[0][price]" placeholder="Giá">
                            </div>

                            <button type="button" class="btn btn-primary mt-2" id="add-product">Thêm Đơn hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Script để thêm input cho sản phẩm
    var productId = 1;

    $('#add-product').click(function() {
        productId++;

        var productHtml = `
            <div class="product">
                <input type="text" class="form-control mb-2" name="products[${productId}][product_id]" placeholder="ID sản phẩm">
                <input type="text" class="form-control mb-2" name="products[${productId}][option_id]" placeholder="ID tùy chọn">
                <input type="text" class="form-control mb-2" name="products[${productId}][quantity]" placeholder="Số lượng">
                <input type="text" class="form-control mb-2" name="products[${productId}][price]" placeholder="Giá">
            </div>
        `;

        $('.product:last').after(productHtml);
    });
</script>
@endsection