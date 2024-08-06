@extends('admin/layout')
@section('title','Dashboard')
@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Admin</li>
        <li>Thống Kê</li>
      </ul>
    </div>
  </section>
  
  <section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Thống Kê
      </h1>
    </div>
  </section>
  
    <section class="section main-section">
      <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
        <div class="card">
          <div class="card-content">
            <div class="flex items-center justify-between">
              <div class="widget-label">
                <h3>
                  Người dùng
                </h3>
                <h1>
                  {{$user->count()}}
                </h1>
              </div>
              <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <div class="flex items-center justify-between">
              <div class="widget-label">
                <h3>
                  Danh Thu
                </h3>
                <h1>
                  {{number_format($orderdetail->sum('price'), 0, ',', '.') . ' VNĐ';}}
                </h1>
              </div>
              <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
            </div>
          </div>
        </div>
  
        <div class="card">
          <div class="card-content">
            <div class="flex items-center justify-between">
              <div class="widget-label">
                <h3>
                  Đơn Hàng 
                </h3>
                <h1>
                  {{$order->count()}}
                </h1>
              </div>
              <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
            </div>
          </div>
        </div>
      </div>
  
      {{-- <div class="card has-table"> --}}
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
              <td data-label="Name">{{$item->full_name}}</td>
              <td data-label="phone">{{$item->phone}}</td>
              <td data-label="Email">{{$item->email}}</td>
              <td data-label="address">{{$item->address}}</td>
              <td data-label="role">
                @if ($item->role == 1)
                    <span>Quản Trị</span>
                @else
                    <span>Khách Hàng</span>
                @endif
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
      
      
      {{-- <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
            Đơn Hàng
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
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
              <div class="table-pagination">
                {{ $product->links() }}
            </div>
            <small>Trang {{ $product->currentPage() }} trên {{ $product->lastPage() }}</small>
            </div>
          </div>
          
        </div>
      </div> --}}
      
     {{--  <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
            Danh mục
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content">
          <table>
            <thead>
            <tr>
              <th>Hình</th>           
              <th>Số thứ tự</th>
              <th>Tên danh mục</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td class="image-cell">
                <div class="image">
                  <img src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg" class="rounded-full">
                </div>
              </td>
              <td data-label="Name">1</td>
              <td data-label="Company">IPHONE</td>
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
            <tr>
              <td class="image-cell">
                <div class="image">
                  <img src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg" class="rounded-full">
                </div>
              </td>
              <td data-label="Name">2</td>
              <td data-label="Company">MAC</td>
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
            <tr>
              <td class="image-cell">
                <div class="image">
                  <img src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg" class="rounded-full">
                </div>
              </td>
              <td data-label="Name">3</td>
              <td data-label="Company">IPAD</td>
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
            <tr>
              <td class="image-cell">
                <div class="image">
                  <img src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg" class="rounded-full">
                </div>
              </td>
              <td data-label="Name">4</td>
              <td data-label="Company">AIRPODS</td>
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
            <tr>
              <td class="image-cell">
                <div class="image">
                  <img src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg" class="rounded-full">
                </div>
              </td>
              <td data-label="Name">5</td>
              <td data-label="Company">WATCHS</td>
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
            </tbody>
          </table>
        </div>
      </div>
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
  
              <td>{{$item->discount_amount	}}</td>
              <td>{{$item->create_date}}</td>
              <td>{{$item->expiry_date}}</td>
              <td>
                <div class="buttons right nowrap">
                  <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                    <a href="{{route('edit_voucher', ['id'=>$item->voucher_id])}}"><span class="icon"><i class="mdi mdi-eye"></i></span></a>
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
      <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
            Đơn hàng
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content">
          <table>
            <thead>
            <tr>
              <th>Tên đơn hàng</th>
              <th>Số Điện Thoại</th>
              <th>Địa chỉ</th>
              <th>Thời gian</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
  
              <td data-label="Name">HCM240803</td>
              <td data-label="Company">0336745555</td>
  
              <td data-label="progress">Quận Gò Vấp, TP. HCM</td>
              <td data-label="Created">24 tháng 6 năm 2024</td>
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
            <tr>
  
              <td data-label="Name">HCM240803</td>
              <td data-label="Company">0336745555</td>
  
              <td data-label="progress">Quận Gò Vấp, TP. HCM</td>
              <td data-label="Created">24 tháng 6 năm 2024</td>
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
            <tr>
  
              <td data-label="Name">HCM240803</td>
              <td data-label="Company">0336745555</td>
  
              <td data-label="progress">Quận Gò Vấp, TP. HCM</td>
              <td data-label="Created">24 tháng 6 năm 2024</td>
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
            <tr>
  
              <td data-label="Name">HCM240803</td>
              <td data-label="Company">0336745555</td>
  
              <td data-label="progress">Quận Gò Vấp, TP. HCM</td>
              <td data-label="Created">24 tháng 6 năm 2024</td>
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
            <tr>
  
              <td data-label="Name">HCM240803</td>
              <td data-label="Company">0336745555</td>
  
              <td data-label="progress">Quận Gò Vấp, TP. HCM</td>
              <td data-label="Created">24 tháng 6 năm 2024</td>
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
            <tr>
  
              <td data-label="Name">HCM240803</td>
              <td data-label="Company">0336745555</td>
  
              <td data-label="progress">Quận Gò Vấp, TP. HCM</td>
              <td data-label="Created">24 tháng 6 năm 2024</td>
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
      </div> --}}
      
    </section>
@endsection
