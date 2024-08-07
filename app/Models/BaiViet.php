<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;

    protected $fillable = [
        'hinh_anh',
        'ten_bai_viet',
        'noi_dung',
        'trang_thai'
    ];
}
