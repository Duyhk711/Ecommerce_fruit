<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listBV = BaiViet::query()->latest('id')->paginate(4);
        // $listPr = SanPham::orderByDesc('id_san_pham')->get();
        $pages_title = "Trang Bài Viết";
        $title = "DANH SÁCH BÀI VIẾT";
        return view('admins.contents.baiviets.index', compact('title','listBV','pages_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pages_title = "Trang Bài Viết";
        $title = "Thêm Bài Viết";
        return view('admins.contents.baiviets.create',compact('title','pages_title'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
           'ten_bai_viet' => 'required|max:255',
                'hinh_anh' => 'image|mimes:jpg,jpeg,webp,gif,png',
                'noi_dung' => 'required|string',
              
        ], [
            'ten_bai_viet.required' => 'Tên bài viết bắt buộc điền',
            'ten_bai_viet.max' => 'Tên bài viết không được quá 100 ký tự',
            'hinh_anh.image' => 'Hình ảnh không hợp lệ',
            'hinh_anh.mimes' => 'Hình ảnh không hợp lệ',
            'noidung.string' => 'Mô tả không hợp lệ',
            'noidung.required' => 'Mô tả không hợp lệ',
        ]);

        if($request->isMethod('POST')){
            $params = $request->post();
            $params = $request->except('_token');
            if($request->hasFile('hinh_anh')){
                $filePath = $request->file('hinh_anh')->store('uploads/baiviets','public');

            }else{
                $filePath = null;
            }
            $params['hinh_anh'] = $filePath;
            BaiViet::create($params);
            return redirect()->route('admins.baiviets.index')->with('msg','Thêm bài viết thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $showBV = BaiViet::query()->findOrFail($id);
        // $listPr = SanPham::orderByDesc('id_san_pham')->get();
        $pages_title = "Chỉnh Sửa Bài Viết";
        $title = "CHỈNH SỬA Bài Viết";
        return view('admins.contents.baiviets.update',compact('showBV' , 'pages_title', 'title'));
    }

    public function update(Request $request, string $id)
    { 
        $request->validate([
            'ten_bai_viet' => 'required|max:255',
                 'hinh_anh' => 'image|mimes:jpg,jpeg,webp,gif,png',
                 'noi_dung' => 'required|string',
                 'ngay_dang' => 'required|date'
         ], [
             'ten_bai_viet.required' => 'Tên bài viết bắt buộc điền',
             'ten_bai_viet.max' => 'Tên bài viết không được quá 100 ký tự',
             'hinh_anh.image' => 'Hình ảnh không hợp lệ',
             'hinh_anh.mimes' => 'Hình ảnh không hợp lệ',
             'ngay_dang.required' => 'Ngày nhập bắt buộc điền',
             'ngay_dang.date' => 'Ngày nhập sai định dạng',
             'noidung.string' => 'Mô tả không hợp lệ',
             'noidung.required' => 'Mô tả không hợp lệ',
         ]);

        if($request->isMethod('PUT')){
        $params = $request->post();
        $params = $request->except('_token', '_method');
        $baiviet = BaiViet::findOrFail($id);

        if($request->hasFile('hinh_anh' )){
            if($baiviet->hinh_anh && Storage::disk('public')->exists('uploads/baiviets', 'public')){
                Storage::disk('public')->delete($baiviet->hinh_anh);
            }
            $filePath = $request->file('hinh_anh')->store('uploads/baiviets','public');
        }else{
            $filePath = $baiviet->hinh_anh;
        }
        $params['hinh_anh'] = $filePath;
        $baiviet->update($params);
        return redirect()->route('admins.baiviets.index')->with('success', 'Cập nhật bài viết thành công');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $baiviet = BaiViet::find($id);
        if($baiviet) {
            $baiviet->delete();
            if($baiviet->hinh_anh && Storage::disk('public')->exists('uploads/baiviets', 'public')){
                Storage::disk('public')->delete($baiviet->hinh_anh);
            }
            return back()->with('delete', 'Xóa Bài Viết thành công!');
        }else {
            return back()->with('error', 'Bài viết không tồn tại!');
        }
        
    }
}

