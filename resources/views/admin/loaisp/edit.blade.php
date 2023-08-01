@extends('admin.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-dark">
        <h5 class="m-0 font-weight-bold text-gray-200">Sửa loại sản phẩm</h5>
    </div>
    <div class="card-body">
        <form action="{{route('admin.loaisp.update',$loaisp)}}" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="txttenloai" class="col-sm-2 col-form-label">Tên loại: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tenloai" id="txttenloai" value="{{$loaisp->tenloai}}">
                </div>
            </div>

            <div class="form-group row justify-content-between">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
                <div class="col-auto">
                    <a href="{{route('admin.loaisp.index')}}" class="btn btn-secondary">Hủy</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection