@extends('user/layout')
@section('title', $blog->title)
@section('content')
<div class="post-wrap padding-large overflow-hidden">
    <div class="container">
      <div class="row">
        <main class="post-grid">
          <div class="row">
            <article class="post-item mt-5">
              <div class="post-content">
                <div class="post-meta text-uppercase">
                  <span class="post-category"> {{ $blog->created_at->format('M d, Y') }} </span> / <span class="meta-date">-  Ảnh</span>
                </div>
                <h1 class="post-title"><strong>{{$blog->title}}</strong></h1>
                <div class="hero-image col-lg-12 mt-5">
                  <img src="{{asset($blog->image_main)}}" alt="single-post" class="img-thumbnail">
                </div>
                <div class="post-description review-item padding-medium">
                  <p>
                    {{$blog->content_1}}
                  </p>
                  <br>

                  <img src="{{asset($blog->image_sub1)}}" alt="img-fluid" class="img-thumbnail">

                  <p>
                    {{$blog->content_2}}
                  </p>

                  <img src="{{asset($blog->image_sub2)}}" alt="img-fluid" class="img-thumbnail">


              </div>
            </article>
            
          </div>
        </main>
      </div>
    </div>
  </div>
  <section id="related-posts" class="padding-large">
    <div class="container">
      <div class="row">
        <div class="display-header d-flex justify-content-between pb-3">
          <h2 class="display-7 text-dark text-uppercase">Tin tức mới nhất</h2>
          <div class="btn-right">
            <a href="{{url('/tin-tuc')}}" class="btn btn-medium btn-normal text-uppercase">Tới tin tức</a>
          </div>
        </div>
        
        <div class="post-grid d-flex flex-wrap justify-content-between">
          @foreach($lastedBlog as $blog)
            <div class="col-lg-4 col-sm-12 pe-3">
              <div class="card border-none">
                <div class="card-image">
                  <img src="{{ asset($blog->image_banner) }}" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">{{ $blog->created_at->format('d F Y') }}</span>
                </div>
                <h3 class="card-title">
                  <a href="{{ route('blog_detail', ['slug'=>$blog->slug]) }}">{{ $blog->title }}</a> <!-- Thay đổi để phù hợp với route và dữ liệu của bạn -->
                </h3>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </div>
  </section>

@endsection