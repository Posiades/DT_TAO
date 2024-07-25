@extends('client/layout')
@section('title', 'Thông Tin')
@section('content')
@if(session('update_info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('update_info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
   <div class="container mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Information</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Tên: </strong> {{ $user->full_name }}</li>
                            <li class="list-group-item"><strong>Email: </strong> {{ $user->email }}</li>
                            <li class="list-group-item"><strong>Địa chỉ: </strong> {{ $user->address }}</li>
                            <li class="list-group-item"><strong>Số điện thoại: </strong> {{ $user->phone }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection