@extends('admin/layout')
@section('title', 'Sửa Bài Viết')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="pull-left">Thêm Bài Viết</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post_edit_blog') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{$blog->blog_id}}">
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Tiêu Đề: </strong>
                                    <input type="text" name="title" class="form-control" placeholder="Nhập Tiêu Đề" value="{{$blog->title}}">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Ảnh Banner:</strong>
                                    <input type="file" name="banner" class="form-control" placeholder="Ảnh Đại Diện Bài Viết" value="{{$blog->image_banner}}">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Ảnh Chính của bài viết:</strong>
                                    <input type="file" name="main" class="form-control" placeholder="Ảnh Chính của Bài Viết" value="{{$blog->image_main}}">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Nội Dung Phần 1:</strong>
                                    <textarea name="content_1" class="form-control" rows="4" placeholder="Nội Dung Phần 1">{{{{$blog->content_1}}}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Nội Dung Phần 2:</strong>
                                    <textarea name="content_2" class="form-control" rows="4" placeholder="Nội Dung Phần 2">{{$blog->content_2}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Ảnh Phụ 1:</strong>
                                    <input type="file" name="sub1" class="form-control" placeholder="Ảnh Phụ 1 Bài Viết" value="{{$blog->image_sub1}}">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Ảnh Phụ 2:</strong>
                                    <input type="file" name="sub2" class="form-control" placeholder="Ảnh Phụ 2 Bài Viết" value="{{$blog->image_sub2}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                            <button type="submit" class="btn btn-primary">THêm Bài Viết</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection