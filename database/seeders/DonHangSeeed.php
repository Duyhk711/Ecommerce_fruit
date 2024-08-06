<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonHangSeeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('don_hangs')->insert([
            'ma_don_hang'=>'DH001',
            'ten_nguoi_nhan'=>'Trần Minh Hoàng Đại',
            'email_nguoi_nhan'=>'tranminhhoangdai@gmail.com',
            'so_dien_thoai'=>'0353872640',
            'dia_chi'=>'Thanh Trì, Hà Nội, Việt Nam',
            'ngay_dat'=>'2024-07-12',
            'nguoi_dung_id'=>'1',
            'tong_tien'=>'1222',
            'ghi_chu'=>'Không',
            'phuong_thuc_thanh_toan'=>'Tiền mặt',
            'id_trang_thai'=>'2'
        ]);
    }
}
