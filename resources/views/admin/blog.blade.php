@extends('admin/layout')
@section('title', 'Bài Viết')
@section('content')
<div class="container mt-5">
    <section class="is-title-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
          <li>Admin</li>
          <li>Bài Viết</li>
        </ul>
        <a href="{{ route('add_blog') }}" class="button blue">
          <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
          <span>Thêm Bài Viết</span>
        </a>
      </div>
    </section>
    
    <section class="is-hero-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
          Bài Viết
        </h1>
      </div>
    </section>
    
    @if(session('add_blog'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('add_blog') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    @if(session('edit_blog'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('edit_blog') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    @if(session('del_blog'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('del_blog') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <section class="section main-section">
      <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-file-document"></i></span>
            Bài Viết
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Tiêu Đề</th>
                <th>Nội Dung Đầu</th>
                <th>Nội Dung Cuối</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($blog as $item)
              <tr>
                <td>{{ $item->blog_id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ \Illuminate\Support\Str::limit($item->content_1, 100) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($item->content_2, 100) }}</td>

                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal" data-target="sample-modal-2" type="button">
                      <a href="{{ route('edit_blog', ['id' => $item->blog_id]) }}"><span class="icon"><i class="mdi mdi-pencil"></i></span></a>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <a href="{{ route('del_confirm', ['id' => $item->blog_id, 'type' => "blog"]) }}"><span class="icon"><i class="mdi mdi-trash-can"></i></span></a>
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
                {{ $blog->links() }}
              </div>
              <small>Trang {{ $blog->currentPage() }} trên {{ $blog->lastPage() }}</small>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

