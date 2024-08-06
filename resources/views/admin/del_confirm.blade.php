@extends('admin/layout')
@section('title', 'Xác Nhận Xóa')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Xác Nhận Xóa</h2>
            </div>

        </div>
    </div>


{{-- ================== Product =============== --}}
   @if ($type == "product")
   <div class="card mx-auto" style="width: 1000px">
    <div class="card-body">
      <form  method="POST" action="{{route('del_execute', ['id'=>$result->product_id, 'type'=>"product"])}}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="type" value="{{$result->category_id}}">
        <input type="hidden" name="id" value="{{$result->product_id}}">
        
        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <h1><strong>Bạn chắc chắn muốn xóa {{$result->name}}</strong></h1>
               
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-3">
                   <button type="submit" class="btn btn-danger">Submit</button>
           </div>
       </div>
   </form>
    </div>
</div>
</div>
{{-- ==================================== User =========================== --}}
   @elseif ($type == "user")
   <div class="card mx-auto" style="width: 1000px">
    <div class="card-body">
      <form  method="POST" action="{{route('del_execute', ['id'=>$result->user_id, 'type'=>"user"])}}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{$result->user_id}}">
        
        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <h1><strong>Bạn chắc chắn muốn xóa {{$result->email}}</strong></h1>
               
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-3">
                   <button type="submit" class="btn btn-danger">Submit</button>
           </div>
       </div>
   </form>
    </div>
</div>
</div>

{{-- ================================ order ============================= --}}
@elseif($type == "order")
<div class="card mx-auto" style="width: 1000px">
  <div class="card-body">
    <form  method="POST" action="{{route('del_execute', ['id'=>$result->order_id, 'type'=>"order"])}}" enctype="multipart/form-data">
      @csrf

      <input type="hidden" name="id" value="{{$result->order_id}}">
      
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <h1><strong>Bạn chắc chắn muốn xóa {{$result->order_id}}</strong></h1>
             
          </div>
      </div>
         <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-3">
                 <button type="submit" class="btn btn-danger">Submit</button>
         </div>
     </div>
 </form>
  </div>
</div>
</div>

{{-- ================================ Category ============================= --}}
@elseif($type == "category")
<div class="card mx-auto" style="width: 1000px">
  <div class="card-body">
    <form  method="POST" action="{{route('del_execute', ['id'=>$result->category_id, 'type'=>"category"])}}" enctype="multipart/form-data">
      @csrf

      <input type="hidden" name="id" value="{{$result->category_id}}">
      
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <h1><strong>Bạn chắc chắn muốn xóa {{$result->category_id}}</strong></h1>
             
          </div>
      </div>
         <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-3">
                 <button type="submit" class="btn btn-danger">Submit</button>
         </div>
     </div>
 </form>
  </div>
</div>
</div>

{{-- ================================= VOucher ============================ --}}
@else
<div class="card mx-auto" style="width: 1000px">
  <div class="card-body">
    <form  method="POST" action="{{route('del_execute', ['id'=>$result->voucher_id, 'type'=>"voucher"])}}" enctype="multipart/form-data">
      @csrf

      <input type="hidden" name="id" value="{{$result->voucher_id}}">
      
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <h1><strong>Bạn chắc chắn muốn xóa {{$result->code}}</strong></h1>
             
          </div>
      </div>
         <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-3">
                 <button type="submit" class="btn btn-danger">Submit</button>
         </div>
     </div>
 </form>
  </div>
</div>
</div>
   @endif
    

@endsection