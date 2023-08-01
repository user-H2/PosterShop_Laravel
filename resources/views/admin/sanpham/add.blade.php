@extends('admin.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-dark">
        <h5 class="m-0 font-weight-bold text-gray-200">Thêm sản phẩm</h5>
    </div>
    <div class="card-body">
        <form action="{{route('admin.sp.addnew',$sp)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="txttensp" class="col-sm-2 col-form-label">Tên sản phẩm: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="txttensp" value="{{$sp->name}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="image" class="col-sm-2 col-form-label">Ảnh: </label>
                <div class="col-sm-10">
                    <input type="file" name="image" id="image" value="{{$sp->image}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gia" class="col-sm-2 col-form-label">Giá: </label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" name="unit_price" id="gia" value="{{$sp->unit_price}}">
                </div>
            </div>
            <div class="mb-3 row">  
                <label for="sl" class="col-sm-2 col-form-label">Số lượng: </label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" name="so_luong" id="sl" value="{{$sp->so_luong}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="mota" class="col-sm-2 col-form-label">Mô tả: </label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="mota_sp" id="mota" value="{{$sp->name}}"></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idloai" class="col-sm-2 col-form-label">Thể loại: </label>
                <div class="col-md-4">
                    <select name="loaisp" id="idloai" class="form-control">
                        @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->tenloai}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idncc" class="col-sm-2 col-form-label">Nguồn cung cấp: </label>
                <div class="col-md-4">
                    <select name="ncc" id="idncc" class="form-control">
                        @foreach($nhacungcap as $item)
                            <option value="{{$item->id}}">{{$item->ten_ncc}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row justify-content-between">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
                <div class="col-auto">
                    <a href="{{route('admin.sp.index')}}" class="btn btn-secondary">Hủy</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection