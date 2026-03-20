<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TaikhoanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('taikhoan')->insert([
            ['UserID' => 1, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'giangvien'],
            ['UserID' => 2, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'giangvien'],
            ['UserID' => 3, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'giangvien'],
            ['UserID' => 4, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'giangvien'],
            ['UserID' => 5, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'giangvien'],
            ['UserID' => 6, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'giangvien'],
            ['UserID' => 7, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'giangvien'],
            ['UserID' => 8, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'giangvien'],
            ['UserID' => 9, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'giangvien'],
            ['UserID' => 10, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'giangvien'],
            ['UserID' => 11, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 12, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 13, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 14, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 15, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 16, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 17, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 18, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 19, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 20, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 21, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 22, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 23, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 24, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 25, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 26, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 27, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 28, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 29, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
            ['UserID' => 30, 'MatKhau' => Hash::make('123456'), 'VaiTro' => 'nghiencuusinh'],
        ]);

    }
}

