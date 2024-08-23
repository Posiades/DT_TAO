@extends('client/layout')
@section('title', 'Liên Hệ Chúng Tôi')
@section('content')

<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-5">
                        @if(session('thanks'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('thanks') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <h2 class="display-7 text-uppercase text-dark text-center mb-4"><strong>Bạn có câu hỏi nào không?</strong></h2>
                        <p class="text-center mb-4">Sử dụng mẫu dưới đây để liên lạc với chúng tôi.</p>
                        <form id="form" class="form-group" method="POST" action="{{route('post_contract')}}">
                            @csrf
                            <div class="form-input mb-3">
                                <input type="text" name="name" placeholder="Viết tên của bạn ở đây" class="form-control ps-3 mb-3" value="{{Session::get('user')->full_name}}">
                            </div>
                            <div class="form-input mb-3">
                                <input type="text" name="email" placeholder="Viết email của bạn ở đây" class="form-control ps-3 mb-3" value="{{Session::get('user')->email}}">
                            </div>
                            <div class="form-input mb-3">
                                <input type="text" name="phone" placeholder="Số điện thoại" class="form-control ps-3 mb-3" value="{{Session::get('user')->phone}}">
                            </div>
                            <div class="form-input mb-3">
                                <input type="text" name="title" placeholder="Viết chủ đề của bạn" class="form-control ps-3 mb-3">
                            </div>
                            <div class="form-input mb-4">
                                <textarea placeholder="Viết nội dung của bạn" name="content" class="form-control ps-3" style="height:150px;"></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark btn-medium text-uppercase btn-rounded-none">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
