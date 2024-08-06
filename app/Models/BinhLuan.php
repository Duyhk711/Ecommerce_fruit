<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;

    protected $table = 'binh_luans';

    protected $fillable = [
        'user_id',
        'san_pham_id',
        'noi_dung',
        'danh_gia'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }

    public function daMua($productId)
    {
        return $this->donHangs()->whereHas('ma_don_hang', function($query) use ($productId) {
            $query->where('san_pham_id', $productId);
        })->exists();
    }
}
