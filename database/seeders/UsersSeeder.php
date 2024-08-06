<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Trần Minh Hoàng Đại',
            'email'=> 'tranminhhoangdai@gmail.com',
            'password' => '04112004',
            'so_dien_thoai'=> '0353872640',
            'dia_chi'=> 'Thanh Trì, Hà Nội, Việt Nam'
        ]);
    }
}
