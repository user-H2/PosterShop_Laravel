@extends('admin.app')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Danh sách loại sản phẩm</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{route('admin.loaisp.new')}}" class="btn btn-primary">Thêm mới</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>TT</th>
                        <th>Tên loại</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loaisp as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$item->tenloai}}</td>
                        <td>
                            <a href="{{route('admin.loaisp.show',$item)}}" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                            <a onclick="return confirm('Ban co muon xoa that khong?');" href="{{route('admin.loaisp.delete',$item)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection