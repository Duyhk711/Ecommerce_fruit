<?php

namespace App\Http\Controllers\Clients;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ShopController extends Controller
{
    public function shop(Request $request){
        $sanPham = SanPham::with('binhLuans')->get();
        $filter = $request->input('filter');
        $search = $request->input('search');
        $listSanPham = SanPham::query()
        ->leftJoin('chi_tiet_don_hangs', 'san_phams.id', '=', 'chi_tiet_don_hangs.san_pham_id')
        ->select('san_phams.*', DB::raw('SUM(chi_tiet_don_hangs.so_luong) as sold_quantity'))
        ->groupBy('san_phams.id')
        ->when($filter, function($query,$filter){
            if ($filter == 'new') {
                return $query->where('is_new', 1); // Lọc sản phẩm mới
            }
            if ($filter == 'hot') {
                return $query->where('is_hot', 1); // Lọc sản phẩm hot
            }
            if ($filter == 'hot_deal') {
                return $query->where('is_hot_deal', 1); // Lọc sản phẩm khuyến mại (hot deal)
            }
            if ($filter == 'favorite') {
                return $query->orderBy('luot_xem', 'desc'); // Lọc sản phẩm yêu thích (nhiều lượt xem nhất)
            }
            if ($filter == 'best_seller') {
                return $query->orderBy('sold_quantity', 'desc'); // Lọc sản phẩm bán chạy (số lượng bán nhiều nhất)
            }
            return $query;
        })
        ->when($search, function($query, $search) {
            return $query->where(function($q) use ($search) {
                $q->where('ten_san_pham', 'like', "%{$search}%")
                  ->orWhere('ma_san_pham', 'like', "%{$search}%");
            });
        })
        ->paginate(9);
            // dd($filter);
            // $listSanPham = SanPham::query()->paginate(8);
            $title="Sản Phẩm";
        return view('clients.contents.shops.shop',compact('listSanPham','title'));
    }
    
    public function detailProduct(string $id){
        $sanPham = SanPham::with('binhLuans')->findOrFail($id);
        $title = 'Chi tiết sản phẩm';
        $danhGiaTrungBinh = $sanPham->binhLuans->whereNotNull('danh_gia')->avg('danh_gia');
        $listSanPham = SanPham::query()->get();
        return view('clients.contents.sanpham.productDetail', compact('sanPham', 'listSanPham', 'danhGiaTrungBinh', 'title'));
    }
}
