@extends('layouts.admin')
@section('content')
<h1><?= $title ?></h1>
<form action="{{route('sanpham.store')}}" method="POST">
    {{-- Làm việc với form trong laravel --}}
    {{-- 
    CSRF field: lầ 1 trường ẩn bắt buộc phải có trong form khi sử dụng laravel --}}
    @csrf
    <div class="col-8">
        <label for="">Tên Tài khoản</label>
        <input class="form-control" type="text" name="name" id="" placeholder="Tên tài khoản">
        <p></p>
    </div>
    <div class="col-8">
        <label for="">email</label>
        <input class="form-control" type="text" name="email" id="" placeholder="Email">
        <p></p>
    </div>
    <div class="col-8">
        <label for="">Password</label>
        <input class="form-control" type="password" name="password" id="" placeholder="Nhập giá sản phẩm">
        <p></p>
    </div>
    <div class="col-8">
        <label for="">Số Điện Thoại</label>
        <input class="form-control" type="number" name="so_dien_thoai" min="1" placeholder="Nhập Số Lượng">
        <p></p>
    </div>
    <div class="col-8">
        <label for="">Địa Chỉ</label>
        <input class="form-control" type="text" name="dia_chi" id="" placeholder="Địa chỉ">
        <p></p>
    </div>
    

    <div class="mb-3 d-flex justify-content-center">
        <button type="reset" class="btn btn-outline-secondaly me-3">Nhập lại</button>
        <button type="submit" class="btn btn-success">Thêm Khách Hàng</button>
    </div>


</form>
@endsection