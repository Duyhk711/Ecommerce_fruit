<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\DanhMuc;

use App\Models\SanPham;

use App\Models\Sliders;
use Illuminate\Http\Request;
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
    public function danhMuc(DanhMuc $cat){
        $sanPham = $cat->sanPhams()->paginate(9);
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
