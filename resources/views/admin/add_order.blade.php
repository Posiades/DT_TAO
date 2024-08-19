@extends('admin/layout')
@section('title', 'Thêm Đơn hàng')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Thêm Đơn Hàng</div>

                <div class="card-body">
                    <form method="POST" action="{{route('post_add_order')}}">
                        @csrf

                        <div class="form-group">
                            <label>User ID (nếu có)</label>
                            <select name="user_id" class="form-select" required>
                                @foreach($order_user as $order)
                                    <option value="{{ $order->user_id }}">  {{ $order->email }} - {{ $order->user_id }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        

                        <div class="form-group mt-2">
                            <label for="order_date">Ngày đặt hàng</label>
                            <input type="date" class="form-control"   name="order_date" required>
                        </div>

                        <div class="form-group">
                            <label>ID Sản Phẩm</label>
                            <select name="product_id" id="product" class="form-select" required>
                                @foreach($order_product as $order)
                                    <option value="{{ $order->product_id}}" data-price="{{ $order->price }}">
                                        {{ $order->name }} {{ $order->color }} {{ "$order->storage"  }} - <strong>ID:</strong> {{ $order->product_id }}
                                    </option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label for="order_date">Số Lượng: </label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" max="99" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="status">Trạng thái</label>
                            <select class="form-control" name="status" required>
                                <option value="1">Chưa Thanh Toán</option>
                                <option value="2">Đã Thanh Toán</option>
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label for="order_date">Giá: </label>
                            <input type="number" name="price" class="form-control" id="product_price"  min="1" max="999999999999999" required>


                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updatePrice() {
        var selectedOption = document.getElementById('product').options[document.getElementById('product').selectedIndex];
        var price = parseFloat(selectedOption.getAttribute('data-price'));
        var quantity = parseInt(document.getElementById('quantity').value);
        
        var totalPrice = price * quantity;
        
        document.getElementById('product_price').value = totalPrice;
    }

    // Cập nhật giá khi thay đổi sản phẩm
    document.getElementById('product').addEventListener('change', updatePrice);

    // Cập nhật giá khi thay đổi số lượng
    document.getElementById('quantity').addEventListener('input', updatePrice);

    // Cập nhật giá ban đầu
    updatePrice();
</script>

@endsection
