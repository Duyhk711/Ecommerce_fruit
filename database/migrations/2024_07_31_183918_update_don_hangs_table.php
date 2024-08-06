<?php

use App\Models\DonHang;
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
        Schema::table('don_hangs', function (Blueprint $table) {
            $table->text('ghi_chu')->nullable()->change();
            $table->string('phuong_thuc_thanh_toan')->default(DonHang::COD)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('don_hangs', function (Blueprint $table) {
            $table->dropColumn('ghi_chu');
            $table->dropColumn('phuong_thuc_thanh_toan');
        });
    }
};
