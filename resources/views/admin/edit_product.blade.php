@extends('admin/layout')
@section('title', 'Sửa Sản Phẩm')
@section('content')
 <div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-primary" href=""> Back</a>
            </div> --}}
        </div>
    </div>
    <div class="card mx-auto" style="width: 1000px">
        <div class="card-body">
<<<<<<< Updated upstream
          <form  method="POST" action="{{url('/admin/post_edit_product')}}" enctype="multipart/form-data">
=======
          <form  method="POST" action="{{url('/admin/post_add_sp')}}" enctype="multipart/form-data">
>>>>>>> Stashed changes
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Loại:</strong>
                        <input type="hidden" name="type" class="form-control" placeholder="Nhập Tên Sản Phẩm" value="{{$product->category_id}}">
                    </div>
                </div>

            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Name:</strong>
                       <input type="text" name="name" class="form-control" placeholder="Nhập Tên Sản Phẩm" value="{{$product->name}}">
                   </div>
               </div>
       
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Image:</strong>
                       <input type="file" name="image_url" class="form-control" placeholder="image">
                   </div>
               </div>
       
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                     <strong>Gia:</strong>
                     <div class="input-group">
                       <input name="price" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="gia" value="{{$product->price_difference}}">
                       <span class="input-group-text">VNĐ</span>
                     </div>
                   </div>
               </div>
               
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                     <strong>Nội dung:</strong>
                     <textarea name="mota" class="form-control" style="height:150px" placeholder="Nội dung">{{$product->description}}</textarea>
                   </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Số Lượng:</strong>
                    <input name="quantity" type="number" class="form-control" placeholder="Số Lượng" value="{{$product->quantity}}">
                </div>
            </div>
               <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-3">
                       <button type="submit" class="btn btn-primary">Submit</button>
               </div>
           </div>
       </form>
        </div>
    </div>
 </div>
@endsection