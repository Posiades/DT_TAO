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
      <a href="Thêm.html"  class="button blue">
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
                <th>Mật khẩu</th>
                <th>Vai trò</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($user as $item)
              <tr>
                <td data-label="Name">{{$item->full_name}}</td>
                <td data-label="Company">{{$item->phone}}</td>
                <td data-label="Email">{{$item->email}}</td>
                <td data-label="progress">{{$item->password}}</td>
                <td data-label="Created">
                  @if ($item->role == 1)
                      <span>Quản Trị</span>
                  @else
                      <span>Khách Hàng</span>
                  @endif
                </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
                                  
              @endforeach

              </tbody>
            </table>
            <div class="table-pagination">
              <div class="flex items-center justify-between">
                <div class="buttons">
                  <button type="button" class="button active">1</button>
                  <button type="button" class="button">2</button>
                  <button type="button" class="button">3</button>
                </div>
                <small>Trang 1 trên 3</small>
              </div>
            </div>
          </div>
        </div>
      
    </section>
</div>
@endsection