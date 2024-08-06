<?php

namespace App\Http\Controllers\Admins;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listDM = DanhMuc::query()->latest('id')->paginate(5);
        // $listPr = SanPham::orderByDesc('id_san_pham')->get();
        $pages_title = "Trang Danh Mục";
        $title = "DANH SÁCH DANH MỤC";
        return view('admins.contents.danhmucs.index', compact('title','listDM','pages_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pages_title = "Thêm Danh Mục";
        $title = "THÊM DANH MỤC";
        return view('admins.contents.danhmucs.create',
        [
            'title' => $title,
            'pages_title' => $pages_title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->isMethod('POST')){
            $params = $request->post();
            $params = $request->except('_token');
            if($request->hasFile('hinh_anh')){
                $filePath = $request->file('hinh_anh')->store('uploads/danhmucs','public');

            }else{
                $filePath = null;
            }
            $params['hinh_anh'] = $filePath;
            DanhMuc::create($params);
            return redirect()->route('admins.danhmucs.index')->with('msg','Thêm danh mục thành công');
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
        $showDM = DanhMuc::query()->findOrFail($id);
        // $listPr = SanPham::orderByDesc('id_san_pham')->get();
        $pages_title = "Chỉnh Sửa Danh Mục";
        $title = "CHỈNH SỬA DANH MỤC";
        return view('admins.contents.danhmucs.update',compact('showDM' , 'pages_title', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $params = $request->post();
            $params = $request->except('_token', '_method');
            $danhMuc = DanhMuc::findOrFail($id);

            if($request->hasFile('hinh_anh' )){
                if($danhMuc->hinh_anh && Storage::disk('public')->exists('uploads/danhmucs', 'public')){
                    Storage::disk('public')->delete($danhMuc->hinh_anh);
                }
                $filePath = $request->file('hinh_anh')->store('uploads/danhmucs','public');
            }else{
                $filePath = $danhMuc->hinh_anh;
            }
            $params['hinh_anh'] = $filePath;
            $danhMuc->update($params);
            return redirect()->route('admins.danhmucs.index')->with('success', 'Cập nhật danh mục thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $danhMuc = DanhMuc::find($id);
        if($danhMuc) {
            $danhMuc->sanPhams()->delete();
            $danhMuc->delete();
            if($danhMuc->hinh_anh && Storage::disk('public')->exists('uploads/danhmucs', 'public')){
                Storage::disk('public')->delete($danhMuc->hinh_anh);
            }
            return back()->with('delete', 'Xóa danh mục thành công!');
        }else {
            return back()->with('error', 'Danh mục không tồn tại!');
        }
        
    }
}
