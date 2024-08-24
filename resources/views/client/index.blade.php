@extends('client/layout')
@section('title', 'Trang Cá Nhân')
@section('content')

<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="data:image/png;base64, {{$user->avata}}" alt="Avatar" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <h4 class="fw-bold">{{ $user->full_name }}</h4>
                        <p class="text-muted">Thành viên từ {{ $user->created_at->format('d/m/Y') }}</p>
                        <div class="d-grid gap-2 mt-2">
                            <a href="{{ route('edit_info') }}" class="btn btn-primary"><i class="fas fa-edit me-2"></i>Chỉnh sửa thông tin</a>
                        </div>
                    </div>
                </div>
                
                {{-- <div class="card shadow-sm border-0 rounded-3 mt-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-3">Hoạt động gần đây</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-shopping-cart text-primary me-2"></i>Đã đặt hàng - 2 giờ trước</li>
                            <li class="mb-2"><i class="fas fa-comment text-success me-2"></i>Đã bình luận - 1 ngày trước</li>
                            <li><i class="fas fa-heart text-danger me-2"></i>Đã thích sản phẩm - 3 ngày trước</li>
                        </ul>
                    </div>
                </div> --}}
            </div>
            
            <div class="col-lg-8">
                @if(session('update_info'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('update_info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow-sm border-0 rounded-3 mb-4">
                    <div class="card-header bg-gradient-primary text-black py-3">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-user-circle me-2"></i>Thông Tin Cá Nhân</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h6 class="fw-bold">Email</h6>
                                <p><i class="fas fa-envelope me-2 text-muted"></i>{{ $user->email }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="fw-bold">Số điện thoại</h6>
                                <p><i class="fas fa-phone me-2 text-muted"></i>{{ $user->phone }}</p>
                            </div>
                            <div class="col-12 mb-3">
                                <h6 class="fw-bold">Địa chỉ</h6>
                                <p><i class="fas fa-map-marker-alt me-2 text-muted"></i>{{ $user->address }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="fw-bold">Ngày sinh</h6>
                                <p><i class="fas fa-birthday-cake me-2 text-muted"></i>{{ $user->birth }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="fw-bold">Giới tính</h6>
                                <p><i class="fas fa-venus-mars me-2 text-muted"></i>{{ $user->sex }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-gradient-success text-black py-3">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-shopping-bag me-2"></i>Đơn Hàng Gần Đây</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#ORD001</td>
                                        <td>15/08/2023</td>
                                        <td>1,500,000 VNĐ</td>
                                        <td><span class="badge bg-success">Đã giao</span></td>
                                        <td><a href="#" class="btn btn-sm btn-outline-primary">Chi tiết</a></td>
                                    </tr>
                                    <tr>
                                        <td>#ORD002</td>
                                        <td>10/08/2023</td>
                                        <td>800,000 VNĐ</td>
                                        <td><span class="badge bg-warning text-dark">Đang xử lý</span></td>
                                        <td><a href="#" class="btn btn-sm btn-outline-primary">Chi tiết</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection