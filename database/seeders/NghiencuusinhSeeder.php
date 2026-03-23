<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NghiencuusinhSeeder extends Seeder
{
    public function run(): void
    {
        // Map khoa names to IDs
        $khoaMap = [
            'CNTT' => 1, // Công nghệ thông tin
            'HTTT' => 4, // Map thành Kinh tế
            'Khoa học máy tính' => 1, // Map thành CNTT
        ];

        DB::table('nghiencuusinh')->insert([
            [
                'MaSinhVien' => 1,
                'UserID' => 11,
                'HoTen' => 'Nguyễn Văn Bình',
                'MaKhoa' => $khoaMap['CNTT'],
                'Lop' => 'KTPM01',
                'Email' => 'caothaituan@gmail.com',
                'NgaySinh' => '2000-05-10',
            ],
            [
                'MaSinhVien' => 2,
                'UserID' => 12,
                'HoTen' => 'Trần Thị Mai',
                'MaKhoa' => $khoaMap['CNTT'],
                'Lop' => 'KTPM02',
                'Email' => 'tranthimai@gmail.com',
                'NgaySinh' => '2000-06-11',
            ],
            [
                'MaSinhVien' => 3,
                'UserID' => 13,
                'HoTen' => 'Lê Hoàng Nam',
                'MaKhoa' => $khoaMap['HTTT'],
                'Lop' => 'HTTT01',
                'Email' => 'tranthimai@gmail.com',
                'NgaySinh' => '1999-11-11',
            ],
            [
                'MaSinhVien' => 4,
                'UserID' => 14,
                'HoTen' => 'Phạm Minh Tuấn',
                'MaKhoa' => $khoaMap['Khoa học máy tính'],
                'Lop' => 'KHMT01',
                'Email' => 'tranthimai@gmail.com',
                'NgaySinh' => '2001-02-02',
            ],
            [
                'MaSinhVien' => 5,
                'UserID' => 15,
                'HoTen' => 'Đỗ Lan Anh',
                'MaKhoa' => $khoaMap['CNTT'],
                'Lop' => 'KTPM03',
                'Email' => 'tranthimai@gmail.com',
                'NgaySinh' => '2000-12-12',
            ],
            [
                'MaSinhVien' => 6,
                'UserID' => 16,
                'HoTen' => 'Hoàng Đức Anh',
                'MaKhoa' => $khoaMap['CNTT'],
                'Lop' => 'KTPM01',
                'Email' => 'tranthimai@gmail.com',
                'NgaySinh' => '2001-03-03',
            ],
            [
                'MaSinhVien' => 7,
                'UserID' => 17,
                'HoTen' => 'Nguyễn Khánh Linh',
                'MaKhoa' => $khoaMap['HTTT'],
                'Lop' => 'HTTT02',
                'Email' => 'tranthimai@gmail.com',
                'NgaySinh' => '2000-08-08',
            ],
            [
                'MaSinhVien' => 8,
                'UserID' => 18,
                'HoTen' => 'Trần Văn Phúc',
                'MaKhoa' => $khoaMap['CNTT'], // Map AI to CNTT
                'Lop' => 'AI01',
                'Email' => 'tranthimai@gmail.com',
                'NgaySinh' => '1999-04-04',
            ],
            [
                'MaSinhVien' => 9,
                'UserID' => 19,
                'HoTen' => 'Lê Minh Nhật',
                'MaKhoa' => $khoaMap['CNTT'],
                'Lop' => 'KTPM02',
                'Email' => 'tranthimai@gmail.com',
                'NgaySinh' => '2001-01-01',
            ],
        ]);
    }
}