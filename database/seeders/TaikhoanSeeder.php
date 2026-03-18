<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaikhoanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('taikhoan')->insert([
            ['UserID' => 1, 'MatKhau' => '123456', 'VaiTro' => 'admin'],
            ['UserID' => 2, 'MatKhau' => '123456', 'VaiTro' => 'giangvien'],
            ['UserID' => 3, 'MatKhau' => '123456', 'VaiTro' => 'giangvien'],
            ['UserID' => 4, 'MatKhau' => '123456', 'VaiTro' => 'giangvien'],
            ['UserID' => 5, 'MatKhau' => '123456', 'VaiTro' => 'giangvien'],
            ['UserID' => 6, 'MatKhau' => '123456', 'VaiTro' => 'giangvien'],
            ['UserID' => 7, 'MatKhau' => '123456', 'VaiTro' => 'giangvien'],
            ['UserID' => 8, 'MatKhau' => '123456', 'VaiTro' => 'giangvien'],
            ['UserID' => 9, 'MatKhau' => '123456', 'VaiTro' => 'giangvien'],
            ['UserID' => 10, 'MatKhau' => '123456', 'VaiTro' => 'giangvien'],
            ['UserID' => 11, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 12, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 13, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 14, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 15, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 16, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 17, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 18, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 19, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 20, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 21, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 22, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 23, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 24, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 25, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 26, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 27, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 28, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 29, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 30, 'MatKhau' => '123456', 'VaiTro' => 'nghiencuusinh'],
        ]);
    }
}

