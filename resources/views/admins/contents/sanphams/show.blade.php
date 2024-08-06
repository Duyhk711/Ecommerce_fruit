@extends('layouts.admin')
@section('css')
    
@endsection
@section('content')
<div class="container mt-4">
    <div id="thongbao" class="alert alert-danger d-none face" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>


    <div class="card">
        <div class="container-fliud">
            <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                action="/php/twig/frontend/giohang/themvaogiohang">
                <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">

                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="">
                            <div class="" >
                                <img src="{{ Storage::url($sanPham->hinh_anh) }}" width="600px" height="500px">
                            </div>
                        </div>
                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{$sanPham->ten_san_pham}}</h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">{{ $sanPham->luot_xem }}</span>
                        </div>
                        <p class="product-description">{{ $sanPham->mo_ta_ngan}}</p>
                        <small class="text-muted">Giá cũ: <s><span>{{ $sanPham->gia_khuyen_mai}} vnđ</span></s></small>
                        <h4 class="price">Giá hiện tại: <span>{{ $sanPham->gia_san_pham}} vnđ</span></h4>
                        <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                            <strong>Uy
                                tín</strong>!</p>
                        <div class="form-group">
                            <label for="soluong">Số lượng đặt mua:</label>
                            <input type="number" class="form-control" id="soluong" name="soluong">
                        </div>
                        <div class="action">
                            <a class="add-to-cart btn btn-default" id="btnThemVaoGioHang">Thêm vào giỏ hàng</a>
                            <a class="like btn btn-default" href="#"><span class="fa fa-heart"></span></a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="container-fluid">
            <h3>Thông tin chi tiết về Sản phẩm</h3>
            <div class="row">
                <div class="col">
                  {{ strip_tags($sanPham->noi_dung) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pages-title')
    {{$pages_title}}
@endsection
