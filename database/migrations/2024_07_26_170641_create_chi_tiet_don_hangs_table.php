<?php

use App\Models\DonHang;
use App\Models\SanPham;
use App\Models\TrangThaiDH;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DonHang::class)->constrained();
            $table->foreignIdFor(SanPham::class)->constrained();
            $table->date('ngay_dat');  
            $table->integer('so_luong');
            $table->double('thanh_tien');
            $table->foreignId('trang_thai_id')->constrained('trang_thai_don_hangs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_don_hangs');
    }
};
