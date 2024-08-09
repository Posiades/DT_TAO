@extends('admin/layout')
@section('title', 'Voucher')
@section('content')
<div class="container mt-5">
  <section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Admin</li>
        <li>Voucher</li>
      </ul>
      <a href="{{route('add_voucher')}}" class="button blue">
        <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
        <span>Thêm Voucher</span>
      </a>
    </div>
  </section>
  
  <section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Voucher
      </h1>
    </div>
  </section>
  
  @if(session('add_voucher'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('add_voucher') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if(session('edit_voucher'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('edit_voucher') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session('del_voucher'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('del_voucher') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

  <section class="section main-section">
      <div class="card has-table">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
              Voucher
            </p>
            <a href="#" class="card-header-icon">
              <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
          </header>
          <div class="card-content">
            <table>
              <thead>
              <tr> 
                <th>Tên Voucher</th>
                <th>Số lượng</th>
                <th>Giá trị</th>
                <th>sản phầm</th>
                <th>Người dùng</th>
                <th>Danh Mục</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($voucher as $item)
              <tr>
                <td>{{$item->code}}</td>
                <td>{{{$item->quantity}}}</td> 
                <td>{{$item->discount_amount}}</td>
                @if ($item->product_id != null)
                    <td>ID: {{$item->product_id}}</td>
                @else
                    <td>Tất Cả Sản Phẩm</td>
                @endif
                @if ($item->user_id != null)
                    <td>ID: {{$item->user_id}}</td>
                @else
                    <td>Tất Cả Người Dùng</td>
                @endif
                @if ($item->category_id != null)
                    <td>ID: {{$item->category_id}}</td>
                @else
                    <td>Tất Cả Danh Mục</td>
                @endif
                <td>{{$item->create_date}}</td>
                <td>{{$item->expiry_date}}</td>
                <td>
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <a href="{{route('edit_voucher', ['id'=>$item->voucher_id])}}"><span class="icon"><i class="mdi mdi-pencil"></i></span></a>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <a href="{{route('del_confirm', ['id'=>$item->voucher_id, 'type'=>"voucher"])}}"><span class="icon"><i class="mdi mdi-trash-can"></i></span></a>
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
                  {{ $voucher->links() }}
              </div>
              <small>Trang {{ $voucher->currentPage() }} trên {{ $voucher->lastPage() }}</small>
              </div>
            </div>
          </div>
        </div>
      
  </section>
</div>

@endsection