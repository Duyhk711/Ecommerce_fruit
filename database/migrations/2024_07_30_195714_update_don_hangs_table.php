<?php

use App\Models\User;
use App\Models\DonHang;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Grammars\ChangeColumn;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('don_hangs', function (Blueprint $table) {
            
           

            // Thêm cột mới
            $table->string('ten_nguoi_nhan');
            $table->string('email_nguoi_nhan');
            $table->string('so_dien_thoai_nguoi_nhan', 10);
            $table->string('dia_chi_nguoi_nhan');
           
            $table->string('trang_thai_don_hang')->default(DonHang::CHO_XAC_NHAN);
            $table->string('trang_thai_thanh_toan')->default(DonHang::CHUA_THANH_TOAN);
            $table->double('tien_hang');
            $table->double('tien_ship');
            $table->double('tong_tien')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('don_hangs', function (Blueprint $table) {
            $table->dropColumn(['ten_nguoi_nhan', 'email_nguoi_nhan', 'so_dien_thoai_nguoi_nhan', 'dia_chi_nguoi_nhan', 'trang_thai_don_hang', 'trang_thai_thanh_toan', 'tien_hang', 'tien_ship']);

            // Khôi phục thuộc tính cũ của cột
            
            
            
        });
    }
};
