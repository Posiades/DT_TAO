@extends('admin/layout')
@section('title', 'Người Dùng')
@section('content')
<div class="container mt-5">
  <section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Admin</li>
        <li>Người Dùng</li>
      </ul>
      <a href="{{ route('add_user') }}" class="button blue">
        <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
        <span>Thêm Người Dùng</span>
      </a>
    </div>
  </section>
  
  <section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Người dùng
      </h1>
    </div>
  </section>
  
  @if(session('add_user'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('add_user') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  
  @if(session('edit_user'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('edit_user') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  
  @if(session('del_user'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('del_user') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  
  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Người dùng
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <table>
          <thead>
            <tr>
              <th>Tên</th>
              <th>Số điện thoại</th>
              <th>Email</th>
              <th>Địa Chỉ</th>
              <th>Vai trò</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $item)
            <tr>
              <td data-label="Name">{{ $item->full_name }}</td>
              <td data-label="phone">{{ $item->phone }}</td>
              <td data-label="Email">{{ $item->email }}</td>
              <td data-label="address">{{ $item->address }}</td>
              <td data-label="role">
                @if ($item->role == 1)
                  <span>Quản Trị</span>
                @else
                  <span>Khách Hàng</span>
                @endif
              </td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <button class="button small green --jb-modal" data-target="sample-modal-2" type="button">
                    <a href="{{ route('edit_user', ['id' => $item->user_id]) }}"><span class="icon"><i class="mdi mdi-pencil"></i></span></a>
                  </button>
                  <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                    <a href="{{ route('del_confirm', ['id' => $item->user_id, 'type' => 'user']) }}"><span class="icon"><i class="mdi mdi-trash-can"></i></span></a>
                  </button>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="table-pagination">
          <div class="flex items-center justify-between">
            <div class="table-pagination">
              {{ $user->links() }}
            </div>
            <small>Trang {{ $user->currentPage() }} trên {{ $user->lastPage() }}</small>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
