@extends('admin/layout')
@section('title', 'Thêm Sản Phẩm')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        {{-- <div class="pull-right">
            <a class="btn btn-primary" href=""> Back</a>
        </div> --}}
    </div>
</div>
<div class="card mx-auto" style="width: 1000px">
    <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">

        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Name:</strong>
                   <input type="text" name="TenSP" class="form-control" placeholder="TenSP">
               </div>
           </div>
   
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Image:</strong>
                   <input type="file" name="image" class="form-control" placeholder="image">
               </div>
           </div>
   
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                 <strong>Gia:</strong>
                 <div class="input-group">
                   <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="gia">
                   <span class="input-group-text">VNĐ</span>
                 </div>
               </div>
           </div>
           
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                 <strong>Nội dung:</strong>
                   <textarea class="form-control" style="height:150px" name="Gia" placeholder="Nội dung"></textarea>
               </div>
           </div>

           <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-3">
                   <button type="submit" class="btn btn-primary">Submit</button>
           </div>
       </div>
   </form>

    </div>
</div>

@endsection