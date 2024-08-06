<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SanPham;

class DanhMuc extends Model
{
    use HasFactory;

    
    protected $table = 'danh_mucs';
    protected $fillable = [
        
        'hinh_anh',
        'ten_danh_muc',
        'trang_thai',
    ];

    protected $casts = [
        'trang_thai' => 'boolean'
    ];

    public function sanPhams (){
        return $this->hasMany(SanPham::class, 'danh_muc_id', 'id');
    }

}
