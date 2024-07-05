@extends('admin/layout');
@section('title', 'Sản Phẩm')
@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Admin</li>
        <li>Sản Phẩm</li>
      </ul>
      <a href="https://justboil.me/" onclick="alert('Coming soon'); return false" target="_blank" class="button blue">
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
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg" class="rounded-full">
                  </div>
                </td>
                <td data-label="Name">iPhone 15 pro max</td>
                <td data-label="Company">iPhone</td>
                <td data-label="progress">iPhone 15 pro max</td>
                <td data-label="Created">iPhone 15 pro max</td>
                <td data-label="progress">28,990,000đ</td>
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
                <td data-label="Name">iPhone 15 pro max</td>
                <td data-label="Company">iPhone</td>
                <td data-label="progress">iPhone 15 pro max</td>
                <td data-label="Created">iPhone 15 pro max</td>
                <td data-label="progress">28,990,000đ</td>
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
                <td data-label="Name">iPhone 15 pro max</td>
                <td data-label="Company">iPhone</td>
                <td data-label="progress">iPhone 15 pro max</td>
                <td data-label="Created">iPhone 15 pro max</td>
                <td data-label="progress">28,990,000đ</td>
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
                <td data-label="Name">iPhone 15 pro max</td>
                <td data-label="Company">iPhone</td>
                <td data-label="progress">iPhone 15 pro max</td>
                <td data-label="Created">iPhone 15 pro max</td>
                <td data-label="progress">28,990,000đ</td>
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
                <td data-label="Name">iPhone 15 pro max</td>
                <td data-label="Company">iPhone</td>
                <td data-label="progress">iPhone 15 pro max</td>
                <td data-label="Created">iPhone 15 pro max</td>
                <td data-label="progress">28,990,000đ</td>
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
                <td data-label="Name">iPhone 15 pro max</td>
                <td data-label="Company">iPhone</td>
                <td data-label="progress">iPhone 15 pro max</td>
                <td data-label="Created">iPhone 15 pro max</td>
                <td data-label="progress">28,990,000đ</td>
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