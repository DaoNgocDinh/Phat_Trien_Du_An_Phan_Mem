<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NghiencuusinhSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nghiencuusinh')->insert([
            [
                'MaSinhVien' => 1,
                'UserID' => 11,
                'HoTen' => 'Nguyễn Văn Bình',
                'Khoa' => 'CNTT',
                'Lop' => 'KTPM01',
                'NgaySinh' => '2000-05-10',
            ],
            [
                'MaSinhVien' => 2,
                'UserID' => 12,
                'HoTen' => 'Trần Thị Mai',
                'Khoa' => 'CNTT',
                'Lop' => 'KTPM02',
                'NgaySinh' => '2000-06-11',
            ],
            [
                'MaSinhVien' => 3,
                'UserID' => 13,
                'HoTen' => 'Lê Hoàng Nam',
                'Khoa' => 'HTTT',
                'Lop' => 'HTTT01',
                'NgaySinh' => '1999-11-11',
            ],
            [
                'MaSinhVien' => 4,
                'UserID' => 14,
                'HoTen' => 'Phạm Minh Tuấn',
                'Khoa' => 'Khoa học máy tính',
                'Lop' => 'KHMT01',
                'NgaySinh' => '2001-02-02',
            ],
            [
                'MaSinhVien' => 5,
                'UserID' => 15,
                'HoTen' => 'Đỗ Lan Anh',
                'Khoa' => 'CNTT',
                'Lop' => 'KTPM03',
                'NgaySinh' => '2000-12-12',
            ],
            [
                'MaSinhVien' => 6,
                'UserID' => 16,
                'HoTen' => 'Hoàng Đức Anh',
                'Khoa' => 'CNTT',
                'Lop' => 'KTPM01',
                'NgaySinh' => '2001-03-03',
            ],
            [
                'MaSinhVien' => 7,
                'UserID' => 17,
                'HoTen' => 'Nguyễn Khánh Linh',
                'Khoa' => 'HTTT',
                'Lop' => 'HTTT02',
                'NgaySinh' => '2000-08-08',
            ],
            [
                'MaSinhVien' => 8,
                'UserID' => 18,
                'HoTen' => 'Trần Văn Phúc',
                'Khoa' => 'AI',
                'Lop' => 'AI01',
                'NgaySinh' => '1999-04-04',
            ],
            [
                'MaSinhVien' => 9,
                'UserID' => 19,
                'HoTen' => 'Lê Minh Nhật',
                'Khoa' => 'CNTT',
                'Lop' => 'KTPM04',
                'NgaySinh' => '2000-07-07',
            ],
            [
                'MaSinhVien' => 10,
                'UserID' => 20,
                'HoTen' => 'Phạm Thảo Vy',
                'Khoa' => 'CNTT',
                'Lop' => 'KTPM05',
                'NgaySinh' => '2001-09-09',
            ],
            [
                'MaSinhVien' => 11,
                'UserID' => 21,
                'HoTen' => 'Đặng Minh Hiếu',
                'Khoa' => 'AI',
                'Lop' => 'AI02',
                'NgaySinh' => '2000-01-01',
            ],
            [
                'MaSinhVien' => 12,
                'UserID' => 22,
                'HoTen' => 'Nguyễn Thu Trang',
                'Khoa' => 'HTTT',
                'Lop' => 'HTTT03',
                'NgaySinh' => '1999-02-02',
            ],
            [
                'MaSinhVien' => 13,
                'UserID' => 23,
                'HoTen' => 'Lý Văn Huy',
                'Khoa' => 'CNTT',
                'Lop' => 'KTPM02',
                'NgaySinh' => '2001-05-05',
            ],
            [
                'MaSinhVien' => 14,
                'UserID' => 24,
                'HoTen' => 'Trần Anh Tuấn',
                'Khoa' => 'KHMT',
                'Lop' => 'KHMT02',
                'NgaySinh' => '2000-06-06',
            ],
            [
                'MaSinhVien' => 15,
                'UserID' => 25,
                'HoTen' => 'Phạm Văn Hoàng',
                'Khoa' => 'CNTT',
                'Lop' => 'KTPM03',
                'NgaySinh' => '2001-07-07',
            ],
        ]);
    }
}

