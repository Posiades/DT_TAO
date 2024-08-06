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
                            <label for="user_id">User ID (nếu có)</label>
                            <input type="text" class="form-control" name="user_id" placeholder="Nếu đơn ngoài thì bỏ qua ô này">
                        </div>

                        <div class="form-group mt-2">
                            <label for="order_date">Ngày đặt hàng</label>
                            <input type="date" class="form-control"  name="order_date">
                        </div>

                        <div class="form-group mt-2">
                            <label for="order_date">ID Sản Phẩm: </label>
                            <input type="number" class="form-control"  name="product_id">
                        </div>

                        <div class="form-group mt-2">
                            <label for="order_date">Số Lượng: </label>
                            <input type="number" class="form-control"  name="quantity">
                        </div>

                        <div class="form-group mt-2">
                            <label for="status">Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="1">Chưa Thanh Toán</option>
                                <option value="2">Đã Thanh Toán</option>
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label for="order_date">Giá: </label>
                            <input type="number" class="form-control" name="price">
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
