<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrangThaiDHSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trang_thai_don_hangs')->insert([
            [
                'ten_trang_thai' => 'Đơn hàng mới'
            ],
            [
                'ten_trang_thai' => 'Đơn hàng lưu trữ'
            ],
            [
                'ten_trang_thai' => 'Đơn hàng hủy'
            ]
        ]);
    }
}
