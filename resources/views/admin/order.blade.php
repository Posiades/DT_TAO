@extends('admin/layout')
@section('title', 'Đơn Hàng')
@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Admin</li>
        <li>Đơn Hàng</li>
      </ul>
      <a href="https://justboil.me/" onclick="alert('Coming soon'); return false" target="_blank" class="button blue">
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
      </div>
      
    </section>
@endsection