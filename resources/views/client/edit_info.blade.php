@extends('client/layout')
@section('title', 'Chỉnh Sửa Thông Tin Cá Nhân')
@section('content')

<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-gradient-primary text-white py-3">
                        <h4 class="mb-0 fw-bold"><i class="fas fa-user-edit me-2"></i>Chỉnh Sửa Thông Tin Cá Nhân</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('post_edit_info', ['id' => $user->user_id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label fw-bold">Họ và Tên</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ $user->full_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label fw-bold">Số điện thoại</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="tel" id="phone" name="phone" class="form-control" value="{{ $user->phone }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="birthday" class="form-label fw-bold">Ngày sinh</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                                        <input type="date" id="birthday" name="birth" class="form-control" value="{{ $user->birth }}">
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="address" class="form-label fw-bold">Địa chỉ</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <input type="text" id="address" name="address" class="form-control" value="{{ $user->address }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Giới tính</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="male" value="Nam" {{ $user->sex == 'Nam' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="male">Nam</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="female" value="Nữ" {{ $user->sex == 'Nữ' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="female">Nữ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="other" value="Khác" {{ $user->sex == 'Khác' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="other">Khác</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="photo" class="form-label fw-bold">Ảnh đại diện</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        <input type="file" id="photo" name="avata" class="form-control" value="{{$user->avata}}">
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Lưu Thay Đổi</button>
                                {{-- <a href="{{ route('user.profile') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>Quay Lại</a> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
