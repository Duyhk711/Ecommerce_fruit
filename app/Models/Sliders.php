<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    use HasFactory;

    protected $table = 'quan_ly_sliders';
    protected $fillable = [
        
        'hinh_anh',
        'trang_thai',
    ];

    protected $casts = [
        'trang_thai' => 'boolean'
    ];

}
