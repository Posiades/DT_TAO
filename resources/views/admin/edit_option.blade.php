@extends('admin/layout')
@section('title', 'Chỉnh Sủa Lựa Chọn')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tùy Chỉnh Lựa Chọn</h2>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-primary" href=""> Back</a>
            </div> --}}
        </div>
    </div>
    <div class="card mx-auto" style="width: 1000px">
        <div class="card-body">
          <form  method="POST" action="{{route('post_edit_option')}}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{$option->option_id}}">
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Product ID</strong>
                       <input type="number" name="product_id" class="form-control" placeholder="Nhập Tên Sản Phẩm" value="{{$option->option_id}}">
                   </div>
               </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Bộ Nhớ:</strong>
                    <input type="text" name="storage" class="form-control" placeholder="Nhập Dung Lượng" value="{{$option->storage}}">
                </div>
            </div>
       
               <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                   <div class="form-group">
                     <strong>Gia:</strong>
                     <div class="input-group">
                       <input name="price" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="gia" value="{{$option->price_difference}}">
                       <span class="input-group-text">VNĐ</span>
                     </div>
                   </div>
               </div>

               <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                  <strong>Số Lượng:</strong>
                    <input name="quantity" type="number" class="form-control" placeholder="Số Lượng" value="{{$option->quantity}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                  <strong>status: </strong>
                    <select name="status" class="form-control">
                        @if ($option->status == "Còn Hàng")
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