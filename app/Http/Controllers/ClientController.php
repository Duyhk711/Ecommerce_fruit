<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\DanhMuc;

use App\Models\SanPham;

use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index(Request $request){
            // $title = 'Chi tiết sản phẩm';
            $sanPham = SanPham::with('binhLuans')->get();
            // $danhGiaTrungBinh = $sanPham->binhLuans->whereNotNull('danh_gia')->avg('danh_gia');
            $keyword = $request->input('keyword');


            $dataSanPham=SanPham::where('ten_san_pham','like',"%{$keyword}%")->take(8)->get();
            $newProducts=SanPham::where('is_new',1)->orderBy('is_new','desc')->take(8)->get();
            $hotProducts=SanPham::where('is_hot',1)->orderBy('is_hot','desc')->take(8)->get();
            $manyViews=SanPham::orderBy('luot_xem','desc')->take(8)->get();
            $hotdealProducts=SanPham::where('is_hot_deal',1)->orderBy('is_hot_deal','desc')->take(8)->get();
            $dataSlider=Sliders::where('trang_thai',1)->orderBy('trang_thai','desc')->get();

         
         // Tìm kiếm sản phẩm theo từ khóa
        
           return view('clients.home',compact('dataSanPham','newProducts','hotProducts','manyViews','hotdealProducts','dataSlider'));
    }
    public function danhMuc(Request $request,DanhMuc $cat){
        $filter = $request->input('filter');
        $search = $request->input('search');
        $sanPham = $cat->sanPhams()
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
        $title = $cat->ten_danh_muc;
        return view('clients.contents.shops.product', compact('cat', 'sanPham', 'title'));
    }

    public function profile(){
        $title = 'Profile';
        $user = Auth::user();
        return view('clients.contents.taikhoans.profile', compact(  'title', 'user'));
    }

   
    public function updateProfile(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'birthday' => 'required|date',
            'gender' => 'required|string|in:nam,nu,khac',
            'address' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::query()->findOrFail($id);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        // Update the user attributes
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->birthday = $request->input('birthday');
        $user->gender = $request->input('gender');
        $user->address = $request->input('address');
        $user->save(); // Save the updated user

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

}
