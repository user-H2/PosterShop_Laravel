@extends('admin.app')
@section('content')
<div style="display:grid; place-items:center">
    <div style="width:800px">
        <table>
            <tr>
                <td>HUYNHposter</td>
            </tr>
            <tr>
                <td>Địa chỉ: Hưng Yên</td>
            </tr>
        </table>
        <h1 style="text-align: center">ĐƠN HÀNG</h1>
        <p>Khách hàng: <b>{{$donhang->name}}</b></p>
        <p>Số điện thoại: <b>{{$donhang->phone}}</b></p>
        <p>Địa chỉ giao hàng: <b>{{$donhang->address}}</b></p>
        <p>Email: {{$donhang->email}}</p>
        <div class="container px-6 mx-auto">
            <h3 class="text-2xl font-medium text-gray-700" style="text-align: center">Danh sách sản phẩm</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>TT</th>
                        <th>Ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chitiet as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="/assets/img/{{$item->image}}" alt="" style="width:100px"></td>
                        <td>{{$item->SanPham->name}}</td>
                        <td>{{$item->soluong}}</td>
                        <td>{{number_format($item->price)}} ₫</td>
                        <td>{{number_format($item->price*$item->soluong)}} ₫</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <span>Tổng: <b>{{number_format($donhang->total)}} ₫</b></span>
        </div>
    </div>
</div>
@endsection
