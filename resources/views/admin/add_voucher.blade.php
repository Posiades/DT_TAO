@extends('admin/layout')
@section('title', 'ThêmMã Giảm Giá')
@section('content')
<div class="container mt-5">
    @if(session('voucher'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('voucher') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="pull-left">Thêm Voucher</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post_add_voucher') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Mã Voucher:</strong>
                                    <input type="text" name="code" class="form-control" placeholder="Nhập Mã Giảm giá" required>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Trị Giá:</strong>
                                    <input type="number" name="money" class="form-control" placeholder="Giá trị" required>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Ngày Tạo:</strong>
                                    <input type="date" id="createDate" name="create" class="form-control" placeholder="Ngày Tạo Voucher" required>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Hạn Voucher:</strong>
                                    <input type="date" id="endDate" name="end" class="form-control" placeholder="Ngày Hết Hạn" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <strong>Số Lượng:</strong>
                                    <input type="number" class="form-control" name="quantity" placeholder="Số Lượng Voucher" required>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                            <button type="submit" class="btn btn-primary">Thêm Voucher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const createDateInput = document.getElementById('createDate');
        const endDateInput = document.getElementById('endDate');

        function validateDates() {
            const createDate = new Date(createDateInput.value);
            const endDate = new Date(endDateInput.value);

            if (createDate && endDate && endDate < createDate) {
                alert('Ngày hết hạn không được bé hơn ngày tạo.');
                endDateInput.value = '';
            }
        }

        createDateInput.addEventListener('change', validateDates);
        endDateInput.addEventListener('change', validateDates);
    });
</script>
@endsection