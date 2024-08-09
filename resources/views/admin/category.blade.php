@extends('admin/layout')
@section('title', 'Danh Mục')
@section('content')
<div class="container mt-5">
  <section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Admin</li>
        <li>Danh Mục</li>
      </ul>
      <a href="{{route('add_category')}}" class="button blue">
        <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
        <span>Thêm Danh Mục</span>
      </a>
    </div>
  </section>
  
  <section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Danh mục
      </h1>
    </div>
  </section>
  
    <section class="section main-section">
      <div class="card has-table">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
              Danh mục
            </p>
            <a href="#" class="card-header-icon">
              <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
          </header>


          @if(session('add_category'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('add_category') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if(session('edit_category'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('edit_category') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if(session('del_category'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('del_category') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif



          <div class="card-content">
            <table>
              <thead>
              <tr>           
                <th>Số thứ tự</th>
                <th>Tên danh mục</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($categories as $item)
              <tr>
                <td data-label="Name">{{$item->category_id}}</td>
                <td data-label="Company">{{$item->name}}</td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <a href="{{route('edit_category', ['id'=>$item->category_id])}}"><span class="icon"><i class="mdi mdi-pencil"></i></span></a>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <a href="{{route('del_confirm', ['id'=>$item->category_id, 'type'=>"category"])}}"><span class="icon"><i class="mdi mdi-trash-can"></i></span></a>
                    </button>
                  </div>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      
    </section>
</div>
@endsection