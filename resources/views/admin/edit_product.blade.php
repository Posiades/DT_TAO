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
          <form  method="POST" action="{{route('post_edit_product', ['id'=>$product->product_id])}}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="type" value="{{$product->category_id}}">
            <input type="hidden" name="id" value="{{$product->product_id}}">
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Tên Sản Phẩm:</strong>
                       <input type="text" name="name" class="form-control" placeholder="Nhập Tên Sản Phẩm" value="{{$product->name}}">
                   </div>
               </div>

               <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Màu Sắc:</strong>
                    <input type="text" name="color" class="form-control" placeholder="Nhập Màu Sắc" value="{{$product->color}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Bộ Nhớ:</strong>
                    <input type="text" name="storage" class="form-control" placeholder="Nhập Dung Lượng" value="{{$product->storage}}">
                </div>
            </div>
       
               <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                   <div class="form-group">
                       <strong>Image:</strong>
                       <input type="file" name="image_url" class="form-control" placeholder="image">
                   </div>
               </div>
       
               <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                   <div class="form-group">
                     <strong>Gia:</strong>
                     <div class="input-group">
                       <input name="price" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="gia" value="{{$product->price_difference}}">
                       <span class="input-group-text">VNĐ</span>
                     </div>
                   </div>
               </div>
               
               <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                  <strong>Cấu Hình:</strong>
                  <textarea name="configtion" class="form-control" style="height:150px" placeholder="Nội dung">{{$product->configtion}}</textarea>
                </div>
            </div>

               <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                   <div class="form-group">
                     <strong>Nội dung:</strong>
                     <textarea name="mota" class="form-control" style="height:150px" placeholder="Nội dung">{{$product->description}}</textarea>
                   </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                  <strong>Số Lượng:</strong>
                    <input name="quantity" type="number" class="form-control" placeholder="Số Lượng" value="{{$product->quantity}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                  <strong>status: </strong>
                    <select name="status" class="form-control">
                        @if ($product->status == "Còn Hàng")
                            <option value="Còn Hàng" selected>Còn Hàng</option>
                            <option value="Hết Hàng">Hết Hàng</option>
                        @else
                        <option value="Còn Hàng">Còn Hàng</option>
                        <option value="Hết Hàng" selected>Hết Hàng</option> 
                        @endif
                    </select>
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