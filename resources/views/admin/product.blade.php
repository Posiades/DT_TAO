@extends('admin/layout');
@section('title', 'Sản Phẩm')
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
  


  @if(session('update_product'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('update_product') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

  @if(session('add_product'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('add_product') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


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

          @if(session('edit_sp'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('edit_sp') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif

      @if(session(' add_product'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session(' add_product') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif
  @if(session(' del_sp'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session(' del_sp') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif
     

          <div class="card-content">
            <table>
              <thead>
              <tr>
                <th>Hình</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Mô Tả</th>
                <th>Mô tả chi tiết</th>
                <th>Giá</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($product as $item)
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img src="{{asset($item->image_url)}}" class="rounded-full">
                  </div>
                </td>
                <td data-label="Name">{{$item->name}}</td>
                <td data-label="Company">{{$item->category_name}}</td>
                <td data-label="progress">{{$item->name}}</td>
                <td data-label="Created">
                  {{ \Illuminate\Support\Str::limit($item->description, 50) }}
                </td>
                <td data-label="progress">{{number_format($item->price_difference, 0, ',', '.'). 'VNĐ'}}</td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                     <a  href="{{route('edit_product', ['id'=>$item->product_id])}}"> <span class="icon"><i class="mdi mdi-eye"></i></span></a>

                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                     <a href="{{route('del_confirm', ['id'=>$item->product_id, 'type'=>"product"])}}">
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