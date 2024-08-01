@extends('admin/layout')
@section('title', 'Tùy Chọn Sản Phẩm')
@section('content')
    <div class="container mt-5">
  <section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Admin</li>
        <li>Sản Phẩm</li>
      </ul>
      <a href="{{route('add_product')}}">
        <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
        <span>Thêm Sản Phẩm</span>
      </a>
    </div>
  </section>
  

  <section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Sản phẩm
      </h1>
    </div>
  </section>
  
    <section class="section main-section">
      <div class="card has-table">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
              Sản Phẩm
            </p>
            <a href="#" class="card-header-icon">
              <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
          </header>

          @if(session('edit_option'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('edit_sp') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif

      @if(session('add_option'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session(' add_option') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif
  @if(session('del_option'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session(' del_option') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif
     

           <div class="card-content">
            <table>
              <thead>
              <tr>
                <th>Hình</th>
                <th>Tên sản phẩm</th>
                <th>Màu Sắc</th>
                <th>Bộ Nhớ</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Tình Trạng</th>
                <th>Thao Tác</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($option_product as $item)
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img src="{{asset($item->image_url)}}" class="rounded-full">
                  </div>
                </td>
                <td>{{$item->name}}</td>
                <td>{{$item->color}}</td>
                <td>{{$item->storage}}</td>
                <td>{{number_format($item->price_difference, 0, ',', '.'). 'VNĐ'}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->status}}</td>
                <td>
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                     <a  href="{{route('edit_option', ['id'=>$item->option_id])}}"> <span class="icon"><i class="mdi mdi-eye"></i></span></a>

                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                     <a href="{{route('del_confirm', ['id'=>$item->option_id, 'type'=>"option"])}}">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                     </a>
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
                  {{ $option_product->links() }}
              </div>
              <small>Trang {{ $option_product->currentPage() }} trên {{ $option_product->lastPage() }}</small>
              </div>
            </div>
          </div>
        </div>
        
      
      
    </section>
</div>
@endsection