<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;


class ShopController extends Controller
{
    public function shop(){
        // $sanPham = SanPham::query()->findOrFail($id);
        $listSanPham = SanPham::query()->paginate(15);
        return view('clients.contents.shops.shop', compact( 'listSanPham'));
    }
    public function doAnNhanh($danhMucId){
        $danhMuc = DanhMuc::query()->findOrFail($danhMucId );
        $sanPham =  $danhMuc->sanPhams;
        return view('clients.contents.shops.doAnNhanh', compact('danhMuc'));
    }
    public function detailProduct(string $id){
        $sanPham = SanPham::with('binhLuans')->findOrFail($id);
        $danhGiaTrungBinh = $sanPham->binhLuans->whereNotNull('danh_gia')->avg('danh_gia');
        $listSanPham = SanPham::query()->get();
        return view('clients.contents.sanpham.productDetail', compact('sanPham', 'listSanPham', 'danhGiaTrungBinh'));
    }
}
