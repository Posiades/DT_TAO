@extends('admin/layout')
@section('title', 'Danh Mục')
@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Admin</li>
        <li>Danh Mục</li>
      </ul>
      <a href="https://justboil.me/" onclick="alert('Coming soon'); return false" target="_blank" class="button blue">
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
      
    </section>
@endsection