@extends('admin/layout')
@section('title', 'Đơn Hàng')
@section('content')
<div class="contaier mt-5">
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Admin</li>
        <li>Đơn Hàng</li>
      </ul>
      <a href="{{ route('add_order') }}"  class="button blue">
        <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
        <span>Thêm Đơn Hàng</span>
      </a>
    </div>
  </section>
  
  <section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Đơn hàng
      </h1>
    </div>
  </section>
  
    <section class="section main-section">
      <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
            Đơn hàng
          </p>
        </header>
        <div class="card-content">

          @if(session('edit_order'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('edit_order') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if(session('add_order'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('add_order') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if(session('del_order'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('del_order') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

          <table>
            <thead>
            <tr>
              <th>ID Đơn Hàng</th>
              <th>Tên Khách Hàng</th>
              <th>Số Điện Thoại</th>
              <th>Địa chỉ</th>
              <th>Sản Phẩm</th>
              <th>Màu Sắc</th>
              <th>Giá</th>
              <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
              <tr>
              @foreach ($order as $item)
              <td>{{$item->order_id}}</td>
              <td>{{$item->full_name}}</td>
              <td>{{$item->phone}}</td>
              <td>{{$item->address}}</td>
              <td>{{$item->name}} {{$item->storage}}</td>
              <td>{{$item->color}}</td>
              <td>{{$item->price}}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                    <a href="{{route('edit_order', ['id'=>$item->order_id])}}"><span class="icon"><i class="mdi mdi-eye"></i></span></a>
                  </button>
                  <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                   <a href="{{route('del_confirm', ['id'=>$item->order_id, 'type'=>"order"])}}"><span class="icon"><i class="mdi mdi-trash-can"></i></span></a>
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
                {{ $order->links() }}
            </div>
            <small>Trang {{ $order->currentPage() }} trên {{ $order->lastPage() }}</small>
            </div>
          </div>
        </div>
      </div>
      {{$order}}
    </section>
  </div>
@endsection