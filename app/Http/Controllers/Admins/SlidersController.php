<?php

namespace App\Http\Controllers\Admins;

use App\Models\Sliders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listSL =Sliders ::query()->latest('id')->paginate(5);
 
        $pages_title = "Trang quản lý Slider";
        $title = "DANH SÁCH SLIDERS";
        return view('admins.contents.Slider.index', compact('title','listSL','pages_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pages_title = "Thêm Slider";
        $title = "THÊM SLIDER";
        return view('admins.contents.Slider.create',
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
        //
        if($request->isMethod('POST')){
            $params = $request->post();
            $params = $request->except('_token');
            $params['trang_thai']  = $request->has('trang_thai') ? 1 : 0;
            if($request->hasFile('hinh_anh')){
                $filePath = $request->file('hinh_anh')->store('uploads/sliders','public');

            }else{
                $filePath = null;
            }
            $params['hinh_anh'] = $filePath;
            Sliders::create($params);
            return redirect()->route('admins.index')->with('msg','Thêm slider thành công');
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
        //
        $title="Sửa slider";
        $pages_title="SỬA SLIDER";
        $listSL=Sliders::findOrFail($id);
        return view('admins.contents.Slider.update',compact('listSL','title','pages_title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if($request->isMethod('PUT')){
            $params = $request->post();
            $params = $request->except('_token', '_method');
            $listSL = Sliders::findOrFail($id);

            if($request->hasFile('hinh_anh' )){
                if($listSL->hinh_anh && Storage::disk('public')->exists('uploads/sliders', 'public')){
                    Storage::disk('public')->delete($listSL->hinh_anh);
                }
                $filePath = $request->file('hinh_anh')->store('uploads/sliders','public');
            }else{
                $filePath = $listSL->hinh_anh;
            }
            $params['hinh_anh'] = $filePath;
            $listSL->update($params);
            return redirect()->route('admins.index')->with('success', 'Cập nhật slider thành công');
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $listSL = Sliders::find($id);
        if($listSL) {
         
            $listSL->delete();
            if($listSL->hinh_anh && Storage::disk('public')->exists('uploads/sliders', 'public')){
                Storage::disk('public')->delete($listSL->hinh_anh);
            }
            return back()->with('delete', 'Xóa  thành công!');
        }else {
            return back()->with('error', ' không tồn tại!');
        }
    }
}
