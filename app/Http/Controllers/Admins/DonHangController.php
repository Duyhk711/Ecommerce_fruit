<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages_title = "Đơn hàng";
        $title = "Danh Sách Đơn Hàng";
        $data = DonHang::query()->orderByDesc('id')->paginate(5);
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $type_huy_don_hang = DonHang::HUY_DON_HANG;
        return view('admins.contents.donhangs.donhang', compact( 'pages_title', 'title', 'data', 'trangThaiDonHang', 'type_huy_don_hang'));
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Chi Tiết Đơn Hàng";
        $donHang = DonHang::query()->findOrFail($id);
        $trangThaiDonHang =  DonHang::TRANG_THAI_DON_HANG;
        $trangThaiThanhToan =  DonHang::TRANG_THAT_THANH_TOAN;
        return view('admins.contents.donhangs.show', compact('title', 'donHang', 'trangThaiDonHang', 'trangThaiThanhToan'));
        
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);
        $currentTrangThai = $donHang->trang_thai_don_hang;

        $newTrangThai = $request->input('trang_thai_don_hang');

        $trangThais = array_keys(DonHang::TRANG_THAI_DON_HANG);
        // $trangThaiThanhToan = array_keys(DonHang::TRANG_THAT_THANH_TOAN);

        // kiểm tra trạng thái đã hủy thì không chọn trạng thái nữa

        if ($currentTrangThai === DonHang::DA_GIAO_HANG) {
            $donHang->trang_thai_thanh_toan = DonHang::DA_THANH_TOAN;
            $donHang->save();
        }

        if ($currentTrangThai === DonHang::HUY_DON_HANG) {
            return redirect()->route('admins.donhangs.index')->with('error', 'Đơn hàng không thể thay đổi trạng thái'); 
        }
        // kiểm tra nếu trạng thái mới không được nằm sau trạng thái hiện tại

        if(array_search($newTrangThai, $trangThais) < array_search($currentTrangThai, $trangThais)){
            return redirect()->route('admins.donhangs.index')->with('error', 'Không thể cập nhật ngược lại trạng thái');
        }

       
        $donHang->trang_thai_don_hang = $newTrangThai;
        
        $donHang->save();
        

        return redirect()->route('admins.donhangs.index')->with('success', 'Cập nhật trạng thái thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);

        if($donHang && $donHang->trang_thai_don_hang == DonHang::HUY_DON_HANG){
            $donHang->chiTietDonHangs()->delete();

            $donHang->delete();

            return redirect()->back()->with('success', 'Xóa đơn hàng thành công');
        }

        return redirect()->back()->with('error', 'Không thể xóa đơn hàng thành công');
    }

    
}
