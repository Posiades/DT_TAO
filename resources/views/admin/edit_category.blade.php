@extends('admin/layout')
@section('title', 'Sửa Danh Mục')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Chỉnh Sửa Mục Sản Phẩm</h2>
            </div>
        </div>
    </div>
    <div class="card mx-auto" style="width: 1000px">
        <div class="card-body">
          <form  method="POST" action="{{route('post_edit_category')}}" enctype="multipart/form-data">
            @csrf
          
            <input type="hidden" name="id">

            <div class="row mt-2">
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Tên Danh Mục: </strong>
                       <input type="text" name="name" class="form-control" placeholder="Nhập Danh Mục" value="{{$category->name}}">
                   </div>
               </div>
               
                

               <div class="row mt-2">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
               </div>
           </div>
       </form>
        </div>
    </div>
 </div>
@endsection