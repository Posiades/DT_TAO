@extends('admin/layout')
@section('title', 'Xác Nhận Xóa')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            @if ($type == "product")
            <div class="card">
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('del_execute', ['id' => $result->product_id, 'type' => 'product']) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $result->product_id }}">
                        <div class="form-group">
                            <h4 class="text-danger"><strong>Bạn chắc chắn muốn xóa sản phẩm: {{ $result->name }}?</strong></h4>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-danger">Xóa</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>

            @elseif ($type == "user")
            <div class="card">
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('del_execute', ['id' => $result->user_id, 'type' => 'user']) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $result->user_id }}">
                        <div class="form-group">
                            <h4 class="text-danger"><strong>Bạn chắc chắn muốn xóa người dùng: {{ $result->full_name }}?</strong></h4>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-danger">Xóa</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>

            @elseif ($type == "order")
            <div class="card">
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('del_execute', ['id' => $result->order_id, 'type' => 'order']) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $result->order_id }}">
                        <div class="form-group">
                            <h4 class="text-danger"><strong>Bạn chắc chắn muốn xóa đơn hàng: {{ $result->order_id }}?</strong></h4>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-danger">Xóa</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>

            @elseif ($type == "blog")
            <div class="card">
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('del_execute', ['id' => $result->blog_id, 'type' => 'order']) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $result->blog_id }}">
                        <div class="form-group">
                            <h4 class="text-danger"><strong>Bạn chắc chắn muốn xóa bài viết: {{ $result->title }}?</strong></h4>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-danger">Xóa</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>

            @elseif ($type == "category")
            <div class="card">
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('del_execute', ['id' => $result->category_id, 'type' => 'category']) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $result->category_id }}">
                        <div class="form-group">
                            <h4 class="text-danger"><strong>Bạn chắc chắn muốn xóa danh mục: {{ $result->name }}?</strong></h4>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-danger">Xóa</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>

            @else
            <div class="card">
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('del_execute', ['id' => $result->voucher_id, 'type' => 'voucher']) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $result->voucher_id }}">
                        <div class="form-group">
                            <h4 class="text-danger"><strong>Bạn chắc chắn muốn xóa voucher: {{ $result->code }}?</strong></h4>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-danger">Xóa</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
