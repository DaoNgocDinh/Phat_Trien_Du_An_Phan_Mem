<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GiangvienSeeder extends Seeder
{
    public function run(): void
    {
        // Map khoa names to IDs
        $khoaMap = [
            'CNTT' => 1, // Công nghệ thông tin
            'HTTT' => 2, // Hệ thống thông tin (sẽ map thành Kinh tế)
            'Khoa học máy tính' => 1, // Map thành CNTT
            'AI' => 1, // Map thành CNTT
            'Phòng khoa học' => 1, // Map thành CNTT
        ];

        // Map chucvu names to IDs
        $chucvuMap = [
            'Trưởng khoa' => 5, // PGS.TS
            'Giảng viên' => 1, // Giảng viên
            'Phó khoa' => 6, // GS.TS
            'Quản trị' => 1, // Giảng viên
        ];

        DB::table('giangvien')->insert([
            [
                'MaGiangVien' => 1,
                'UserID' => 2,
                'HoTen' => 'Nguyễn Văn An',
                'MaChucVu' => $chucvuMap['Trưởng khoa'],
                'MaKhoa' => $khoaMap['CNTT'],
                'Email' => 'an@uni.edu',
                'Sdt' => '0911111111',
                'AnhDaiDien' => 'gv1.jpg',
                'CV' => 'cv1.pdf',
                'NgaySinh' => '1980-01-01',
            ],
            [
                'MaGiangVien' => 2,
                'UserID' => 3,
                'HoTen' => 'Trần Minh Hùng',
                'MaChucVu' => $chucvuMap['Giảng viên'],
                'MaKhoa' => $khoaMap['CNTT'],
                'Email' => 'hung@uni.edu',
                'Sdt' => '0911111112',
                'AnhDaiDien' => 'gv2.jpg',
                'CV' => 'cv2.pdf',
                'NgaySinh' => '1985-05-15',
            ],
            [
                'MaGiangVien' => 3,
                'UserID' => 4,
                'HoTen' => 'Lê Thu Hà',
                'MaChucVu' => $chucvuMap['Phó khoa'],
                'MaKhoa' => 4, // Kinh tế
                'Email' => 'ha@uni.edu',
                'Sdt' => '0911111113',
                'AnhDaiDien' => 'gv3.jpg',
                'CV' => 'cv3.pdf',
                'NgaySinh' => '1978-09-20',
            ],
            [
                'MaGiangVien' => 4,
                'UserID' => 5,
                'HoTen' => 'Phạm Quang Dũng',
                'MaChucVu' => $chucvuMap['Giảng viên'],
                'MaKhoa' => $khoaMap['CNTT'],
                'Email' => 'dung@uni.edu',
                'Sdt' => '0911111114',
                'AnhDaiDien' => 'gv4.jpg',
                'CV' => 'cv4.pdf',
                'NgaySinh' => '1982-12-10',
            ],
            [
                'MaGiangVien' => 5,
                'UserID' => 6,
                'HoTen' => 'Đặng Minh Tuấn',
                'MaChucVu' => $chucvuMap['Giảng viên'],
                'MaKhoa' => $khoaMap['CNTT'],
                'Email' => 'tuan@uni.edu',
                'Sdt' => '0911111115',
                'AnhDaiDien' => 'gv5.jpg',
                'CV' => 'cv5.pdf',
                'NgaySinh' => '1988-03-25',
            ],
            [
                'MaGiangVien' => 6,
                'UserID' => 7,
                'HoTen' => 'Nguyễn Hoàng Nam',
                'MaChucVu' => $chucvuMap['Giảng viên'],
                'MaKhoa' => 4, // Kinh tế
                'Email' => 'nam@uni.edu',
                'Sdt' => '0911111116',
                'AnhDaiDien' => 'gv6.jpg',
                'CV' => 'cv6.pdf',
                'NgaySinh' => '1990-07-30',
            ],
            [
                'MaGiangVien' => 7,
                'UserID' => 8,
                'HoTen' => 'Trần Quốc Bảo',
                'MaChucVu' => $chucvuMap['Giảng viên'],
                'MaKhoa' => $khoaMap['CNTT'],
                'Email' => 'bao@uni.edu',
                'Sdt' => '0911111117',
                'AnhDaiDien' => 'gv7.jpg',
                'CV' => 'cv7.pdf',
                'NgaySinh' => '1983-11-05',
            ],
            [
                'MaGiangVien' => 8,
                'UserID' => 9,
                'HoTen' => 'Phạm Thanh Long',
                'MaChucVu' => $chucvuMap['Giảng viên'],
                'MaKhoa' => $khoaMap['CNTT'],
                'Email' => 'long@uni.edu',
                'Sdt' => '0911111118',
                'AnhDaiDien' => 'gv8.jpg',
                'CV' => 'cv8.pdf',
                'NgaySinh' => '1987-02-18',
            ],
            [
                'MaGiangVien' => 9,
                'UserID' => 10,
                'HoTen' => 'Lý Văn Đức',
                'MaChucVu' => $chucvuMap['Giảng viên'],
                'MaKhoa' => $khoaMap['CNTT'],
                'Email' => 'duc@uni.edu',
                'Sdt' => '0911111119',
                'AnhDaiDien' => 'gv9.jpg',
                'CV' => 'cv9.pdf',
                'NgaySinh' => '1984-06-12',
            ],
            [
                'MaGiangVien' => 10,
                'UserID' => 1,
                'HoTen' => 'Admin Hệ Thống',
                'MaChucVu' => $chucvuMap['Quản trị'],
                'MaKhoa' => $khoaMap['CNTT'],
                'Email' => 'admin@uni.edu',
                'Sdt' => '0999999999',
                'AnhDaiDien' => 'admin.jpg',
                'CV' => 'admincv.pdf',
                'NgaySinh' => '1975-01-01',
            ],
        ]);
    }
}

