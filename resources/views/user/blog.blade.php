@extends('user.layout')
@section('title', 'Tin Tức')
@section('content')
<section class="hero-section position-relative bg-light-blue padding-medium">
    <div class="hero-content">
      <div class="container">
        <div class="row">
          <div class="text-center padding-large no-padding-bottom">
            <h1 class="display-2 text-uppercase text-dark">Tin Tức</h1>
            <div class="breadcrumbs">
              <span class="item">
                <a href="index.html">Trang Chủ ></a>
              </span>
              <span class="item">Tinh Tức</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="post-grid padding-large">
    <div class="container">
      <div class="row d-flex flex-wrap">
        <aside class="col-md-3">
          <div class="sidebar">
            <div class="widget-search-bar">
              <form role="search" method="get" action="{{route('find_blog')}}" class="d-flex">
                <input class="search-field" name="keyword" placeholder="Tên Bài Viết" type="search">
                  <button type="submit" class="btn btn-outline-dark">
                    <svg class="search content-light">
                      <use xlink:href="#search"></use>
                    </svg>
                  </button>
              </form>
            </div>
          </div>
        </aside>

        
        @if ($side_show == null)
          <main class="col-md-9">
            <div class="row">
              @foreach($blog as $post)
                <div class="col-lg-4">
                  <div class="card border-none">
                    <div class="card-image">
                      <img src="{{ asset($post->image_banner) }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body text-uppercase">
                      <div class="card-meta text-muted">
                        <span class="meta-date">{{ $post->created_at->format('M d, Y') }}</span>
                      </div>
                      <h3 class="card-title">
                        <a href="{{ route('blog_detail', ['slug'=>$post->slug]) }}">{{ $post->title }}</a>
                      </h3>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            <nav class="navigation paging-navigation text-center padding-medium" role="navigation">
              <div class="pagination loop-pagination d-flex justify-content-center align-items-center">
                {{ $blog->links() }}
              </div>
            </nav>
          </main>
        @else
          @if ($blog_find->total() > 0)
          <main class="col-md-9">
            <div class="row">
              @foreach($blog_find as $post)
                <div class="col-lg-4">
                  <div class="card border-none">
                    <div class="card-image">
                      <img src="{{ asset($post->image_banner) }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body text-uppercase">
                      <div class="card-meta text-muted">
                        <span class="meta-date">{{ $post->created_at->format('M d, Y') }}</span>
                      </div>
                      <h3 class="card-title">
                        <a href="{{ route('blog_detail', ['slug'=>$post->slug]) }}">{{ $post->title }}</a>
                      </h3>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            <nav class="navigation paging-navigation text-center padding-medium" role="navigation">
              <div class="pagination loop-pagination d-flex justify-content-center align-items-center">
                {{ $blog_find->links() }}
              </div>
            </nav>
          </main>
          @else
            <main class="col-md-9">
              <div class="row">
                <h1> Không tìm thấy kết quả phù hợp </h1>
              </div>
            </main>
          
          @endif
        @endif


      </div>
    </div>
  </section>
@endsection
