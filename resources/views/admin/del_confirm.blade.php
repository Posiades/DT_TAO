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



    {{-- ================== Product ============== --}}
    <div class="card mx-auto" style="width: 1000px">
        <div class="card-body">
          <form  method="POST" action="{{route('del_execute', ['id'=>$result->product_id])}}" enctype="multipart/form-data">
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

@endsection