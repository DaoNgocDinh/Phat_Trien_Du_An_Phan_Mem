<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GiangvienSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('giangvien')->insert([
            [
                'MaGiangVien' => 1,
                'UserID' => 2,
                'HoTen' => 'Nguyễn Văn An',
                'ChucVu' => 'Trưởng khoa',
                'Khoa' => 'CNTT',
                'Email' => 'an@uni.edu',
                'Sdt' => '0911111111',
                'AnhDaiDien' => 'gv1.jpg',
                'CV' => 'cv1.pdf',
            ],
            [
                'MaGiangVien' => 2,
                'UserID' => 3,
                'HoTen' => 'Trần Minh Hùng',
                'ChucVu' => 'Giảng viên',
                'Khoa' => 'CNTT',
                'Email' => 'hung@uni.edu',
                'Sdt' => '0911111112',
                'AnhDaiDien' => 'gv2.jpg',
                'CV' => 'cv2.pdf',
            ],
            [
                'MaGiangVien' => 3,
                'UserID' => 4,
                'HoTen' => 'Lê Thu Hà',
                'ChucVu' => 'Phó khoa',
                'Khoa' => 'HTTT',
                'Email' => 'ha@uni.edu',
                'Sdt' => '0911111113',
                'AnhDaiDien' => 'gv3.jpg',
                'CV' => 'cv3.pdf',
            ],
            [
                'MaGiangVien' => 4,
                'UserID' => 5,
                'HoTen' => 'Phạm Quang Dũng',
                'ChucVu' => 'Giảng viên',
                'Khoa' => 'Khoa học máy tính',
                'Email' => 'dung@uni.edu',
                'Sdt' => '0911111114',
                'AnhDaiDien' => 'gv4.jpg',
                'CV' => 'cv4.pdf',
            ],
            [
                'MaGiangVien' => 5,
                'UserID' => 6,
                'HoTen' => 'Đặng Minh Tuấn',
                'ChucVu' => 'Giảng viên',
                'Khoa' => 'CNTT',
                'Email' => 'tuan@uni.edu',
                'Sdt' => '0911111115',
                'AnhDaiDien' => 'gv5.jpg',
                'CV' => 'cv5.pdf',
            ],
            [
                'MaGiangVien' => 6,
                'UserID' => 7,
                'HoTen' => 'Nguyễn Hoàng Nam',
                'ChucVu' => 'Giảng viên',
                'Khoa' => 'HTTT',
                'Email' => 'nam@uni.edu',
                'Sdt' => '0911111116',
                'AnhDaiDien' => 'gv6.jpg',
                'CV' => 'cv6.pdf',
            ],
            [
                'MaGiangVien' => 7,
                'UserID' => 8,
                'HoTen' => 'Trần Quốc Bảo',
                'ChucVu' => 'Giảng viên',
                'Khoa' => 'CNTT',
                'Email' => 'bao@uni.edu',
                'Sdt' => '0911111117',
                'AnhDaiDien' => 'gv7.jpg',
                'CV' => 'cv7.pdf',
            ],
            [
                'MaGiangVien' => 8,
                'UserID' => 9,
                'HoTen' => 'Phạm Thanh Long',
                'ChucVu' => 'Giảng viên',
                'Khoa' => 'AI',
                'Email' => 'long@uni.edu',
                'Sdt' => '0911111118',
                'AnhDaiDien' => 'gv8.jpg',
                'CV' => 'cv8.pdf',
            ],
            [
                'MaGiangVien' => 9,
                'UserID' => 10,
                'HoTen' => 'Lý Văn Đức',
                'ChucVu' => 'Giảng viên',
                'Khoa' => 'CNTT',
                'Email' => 'duc@uni.edu',
                'Sdt' => '0911111119',
                'AnhDaiDien' => 'gv9.jpg',
                'CV' => 'cv9.pdf',
            ],
            [
                'MaGiangVien' => 10,
                'UserID' => 1,
                'HoTen' => 'Admin Hệ Thống',
                'ChucVu' => 'Quản trị',
                'Khoa' => 'Phòng khoa học',
                'Email' => 'admin@uni.edu',
                'Sdt' => '0999999999',
                'AnhDaiDien' => 'admin.jpg',
                'CV' => 'admincv.pdf',
            ],
        ]);
    }
}

