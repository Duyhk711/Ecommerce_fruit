<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BinhLuan;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BinhLuanController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'binh_luan' => 'required',
            'danh_gia' => 'integer',
        ]);
        
        $product = SanPham::findOrFail($id);
        $user = auth()->user();

        // dd($user->daMua($product->id));
        if (!$user->daMua($product->id)) {
            return redirect()->back()->with('error', 'Bạn cần mua sản phẩm này để bình luận.');
        }
    
        // Lưu bình luận và đánh giá
        $comment = new BinhLuan();
        $comment->user_id = auth()->id();
        $comment->san_pham_id = $product->id;
        $comment->noi_dung = $request->binh_luan;
        $comment->danh_gia = $request->danh_gia;
        $comment->save();

        return redirect()->back()->with('success', 'Đã gửi bình luận.');
    }
}
