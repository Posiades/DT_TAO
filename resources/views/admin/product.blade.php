@extends('admin/layout')
@section('title', 'Sản Phẩm')
@section('content')
@if ($type != null)
<div class="container mt-5">
  <section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Admin</li>
        <li>Sản Phẩm</li>
      </ul>
      <a href="{{ route('add_product') }}" class="button blue">
        <span class="icon"><i class="mdi mdi-cart"></i></span>
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
  
  @if(session('add_product'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('add_product') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session('edit_sp'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('edit_sp') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session('del_sp'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('del_sp') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  
  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-cart"></i></span>
          Sản phẩm
        </p>
        
        <!-- Dropdown Filter -->
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Lọc Danh Mục
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="{{route('product_filter', ['type'=>"iphone"])}}">Iphone</a></li>
            <li><a class="dropdown-item" href="{{route('product_filter', ['type'=>"mac"])}}">MAC</a></li>
            <li><a class="dropdown-item" href="{{route('product_filter', ['type'=>"ipad"])}}">Ipad</a></li>
            <li><a class="dropdown-item" href="{{route('product_filter', ['type'=>"watch"])}}">Watch</a></li>
            <li><a class="dropdown-item" href="{{route('product_filter', ['type'=>"airpod"])}}">Airpod</a></li>
          </ul>
        </div>
      </header>
      <div class="card-content">
        <table>
          <thead>
            <tr>
              <th>Hình</th>
              <th>Tên sản phẩm</th>
              <th>Danh mục</th>
              <th>Màu Sắc</th>
              <th>Bộ Nhớ/Kích Thước</th>
              <th>Mô tả chi tiết</th>
              <th>Giá</th>
              <th>Thao Tác</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($product as $item)
            <tr>
              <td class="image-cell">
                <div class="image">
                  <img src="data:image/png;base64,{{ $item->image }}" class="rounded-full">
                </div>
              </td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->category_name }}</td>
              <td>{{ $item->color }}</td>
              <td>{{ $item->storage }}</td>
              <td data-label="Description">
                {{ \Illuminate\Support\Str::limit($item->description, 50) }}
              </td>
              <td data-label="Price">{{ number_format($item->price, 0, ',', '.') . ' VNĐ' }}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <button class="button small green --jb-modal" data-target="sample-modal-2" type="button">
                    <a href="{{ route('edit_product', ['id' => $item->product_id]) }}"><span class="icon"><i class="mdi mdi-pencil"></i></span></a>
                  </button>
                  <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                    <a href="{{ route('del_confirm', ['id' => $item->product_id, 'type' => 'product']) }}"><span class="icon"><i class="mdi mdi-trash-can"></i></span></a>
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
              {{ $product->links() }}
            </div>
            <small>Trang {{ $product->currentPage() }} trên {{ $product->lastPage() }}</small>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>










    {{-- =================== else ===================== --}}
@else
<div class="container mt-5">
  <section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Admin</li>
        <li>Sản Phẩm</li>
      </ul>
      <a href="{{ route('add_product') }}" class="button blue">
        <span class="icon"><i class="mdi mdi-cart"></i></span>
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
  
  @if(session('add_product'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('add_product') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session('edit_sp'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('edit_sp') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session('del_sp'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('del_sp') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  
  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-cart"></i></span>
          Sản phẩm
        </p>
        
        <!-- Dropdown Filter -->
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Chọn bộ lọc
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="{{route('product_filter', ['type'=>"iphone"])}}">Iphone</a></li>
            <li><a class="dropdown-item" href="{{route('product_filter', ['type'=>"mac"])}}">MAC</a></li>
            <li><a class="dropdown-item" href="{{route('product_filter', ['type'=>"ipad"])}}">Ipad</a></li>
            <li><a class="dropdown-item" href="{{route('product_filter', ['type'=>"watch"])}}">Watch</a></li>
            <li><a class="dropdown-item" href="{{route('product_filter', ['type'=>"airpod"])}}">Airpod</a></li>
          </ul>
        </div>
      </header>
      <div class="card-content">
        <table>
          <thead>
            <tr>
              <th>Hình</th>
              <th>Tên sản phẩm</th>
              <th>Danh mục</th>
              <th>Màu Sắc</th>
              <th>Bộ Nhớ</th>
              <th>Mô tả chi tiết</th>
              <th>Giá</th>
              <th>Thao Tác</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($product as $item)
            <tr>
              <td class="image-cell">
                <div class="image">
                  <img src="data:image/png;base64,{{ $item->image }}" class="rounded-full">
                </div>
              </td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->category_name }}</td>
              <td>{{ $item->color }}</td>
              <td>{{ $item->storage }}</td>
              <td data-label="Description">
                {{ \Illuminate\Support\Str::limit($item->description, 50) }}
              </td>
              <td data-label="Price">{{ number_format($item->price, 0, ',', '.') . ' VNĐ' }}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <button class="button small green --jb-modal" data-target="sample-modal-2" type="button">
                    <a href="{{ route('edit_product', ['id' => $item->product_id]) }}"><span class="icon"><i class="mdi mdi-pencil"></i></span></a>
                  </button>
                  <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                    <a href="{{ route('del_confirm', ['id' => $item->product_id, 'type' => 'product']) }}"><span class="icon"><i class="mdi mdi-trash-can"></i></span></a>
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
              {{ $product->links() }}
            </div>
            <small>Trang {{ $product->currentPage() }} trên {{ $product->lastPage() }}</small>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endif
@endsection
