<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->unsignedInteger('so_luong')->change();
            
            // Thay đổi cột `don_gia`
            $table->double('don_gia'); // Nếu bạn muốn chèn nó vào vị trí cụ thể

            // Xóa cột `ngay_dat` và `trang_thai_id`
            $table->dropColumn('ngay_dat');
            $table->dropForeign(['trang_thai_id']); // Xóa khóa ngoại
            $table->dropColumn('trang_thai_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->date('ngay_dat')->after('foreignIdFor(SanPham::class)');
            $table->foreignId('trang_thai_id')->constrained('trang_thai_don_hangs');

            // Khôi phục cột `so_luong` từ `unsignedInteger` về `integer`
            $table->integer('so_luong')->change();

            // Khôi phục cột `don_gia`
            $table->dropColumn('don_gia');
        });
    }
};
