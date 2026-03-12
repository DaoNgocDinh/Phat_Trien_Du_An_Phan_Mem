<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LienheSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lienhe')->insert([
            [
                'MaLienHe' => 1,
                'HoTen' => 'Nguyễn Văn A',
                'Email' => 'a@gmail.com',
                'ChuDe' => 'Hỏi về đề tài',
                'NoiDung' => 'Tôi muốn đăng ký đề tài',
                'ThoiGianGui' => '2025-01-01',
            ],
            [
                'MaLienHe' => 2,
                'HoTen' => 'Trần Văn B',
                'Email' => 'b@gmail.com',
                'ChuDe' => 'Hỏi về sự kiện',
                'NoiDung' => 'Sự kiện AI khi nào tổ chức',
                'ThoiGianGui' => '2025-01-02',
            ],
            [
                'MaLienHe' => 3,
                'HoTen' => 'Lê Văn C',
                'Email' => 'c@gmail.com',
                'ChuDe' => 'Hỏi về hội thảo',
                'NoiDung' => 'Thông tin hội thảo',
                'ThoiGianGui' => '2025-01-03',
            ],
            [
                'MaLienHe' => 4,
                'HoTen' => 'Phạm Văn D',
                'Email' => 'd@gmail.com',
                'ChuDe' => 'Hỗ trợ',
                'NoiDung' => 'Không đăng nhập được',
                'ThoiGianGui' => '2025-01-04',
            ],
            [
                'MaLienHe' => 5,
                'HoTen' => 'Hoàng Văn E',
                'Email' => 'e@gmail.com',
                'ChuDe' => 'Đăng ký',
                'NoiDung' => 'Tôi muốn tham gia',
                'ThoiGianGui' => '2025-01-05',
            ],
            [
                'MaLienHe' => 6,
                'HoTen' => 'Nguyễn Văn F',
                'Email' => 'f@gmail.com',
                'ChuDe' => 'Thông tin',
                'NoiDung' => 'Xin thêm thông tin',
                'ThoiGianGui' => '2025-01-06',
            ],
            [
                'MaLienHe' => 7,
                'HoTen' => 'Trần Văn G',
                'Email' => 'g@gmail.com',
                'ChuDe' => 'Đề tài',
                'NoiDung' => 'Hỏi về đề tài',
                'ThoiGianGui' => '2025-01-07',
            ],
            [
                'MaLienHe' => 8,
                'HoTen' => 'Lê Văn H',
                'Email' => 'h@gmail.com',
                'ChuDe' => 'Sự kiện',
                'NoiDung' => 'Đăng ký workshop',
                'ThoiGianGui' => '2025-01-08',
            ],
            [
                'MaLienHe' => 9,
                'HoTen' => 'Phạm Văn I',
                'Email' => 'i@gmail.com',
                'ChuDe' => 'Hỗ trợ',
                'NoiDung' => 'Upload file lỗi',
                'ThoiGianGui' => '2025-01-09',
            ],
            [
                'MaLienHe' => 10,
                'HoTen' => 'Nguyễn Văn K',
                'Email' => 'k@gmail.com',
                'ChuDe' => 'Khác',
                'NoiDung' => 'Góp ý hệ thống',
                'ThoiGianGui' => '2025-01-10',
            ],
        ]);
    }
}

