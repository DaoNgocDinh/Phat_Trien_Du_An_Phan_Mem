<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThongbaoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('thongbao')->insert([
            [
                'MaThongBao' => 1,
                'TieuDe' => 'Thông báo hội thảo',
                'NoiDung' => 'Hội thảo AI tháng 5',
                'LoaiThongBao' => 'chưa đọc',
                'NgayTao' => '2025-03-01',
            ],
            [
                'MaThongBao' => 2,
                'TieuDe' => 'Thông báo đề tài',
                'NoiDung' => 'Mở đăng ký đề tài mới',
                'LoaiThongBao' => 'chưa đọc',
                'NgayTao' => '2025-03-02',
            ],
            [
                'MaThongBao' => 3,
                'TieuDe' => 'Thông báo sự kiện',
                'NoiDung' => 'Workshop Data',
                'LoaiThongBao' => 'chưa đọc',
                'NgayTao' => '2025-03-03',
            ],
            [
                'MaThongBao' => 4,
                'TieuDe' => 'Thông báo công bố',
                'NoiDung' => 'Đăng bài mới',
                'LoaiThongBao' => 'đã đọc',
                'NgayTao' => '2025-03-04',
            ],
            [
                'MaThongBao' => 5,
                'TieuDe' => 'Thông báo hệ thống',
                'NoiDung' => 'Bảo trì hệ thống',
                'LoaiThongBao' => 'chưa đọc',
                'NgayTao' => '2025-03-05',
            ],
            [
                'MaThongBao' => 6,
                'TieuDe' => 'Thông báo đề tài',
                'NoiDung' => 'Duyệt đề tài',
                'LoaiThongBao' => 'đã đọc',
                'NgayTao' => '2025-03-06',
            ],
            [
                'MaThongBao' => 7,
                'TieuDe' => 'Thông báo seminar',
                'NoiDung' => 'Seminar AI',
                'LoaiThongBao' => 'chưa đọc',
                'NgayTao' => '2025-03-07',
            ],
            [
                'MaThongBao' => 8,
                'TieuDe' => 'Thông báo hội nghị',
                'NoiDung' => 'Conference 2025',
                'LoaiThongBao' => 'chưa đọc',
                'NgayTao' => '2025-03-08',
            ],
            [
                'MaThongBao' => 9,
                'TieuDe' => 'Thông báo cập nhật',
                'NoiDung' => 'Cập nhật hệ thống',
                'LoaiThongBao' => 'đã đọc',
                'NgayTao' => '2025-03-09',
            ],
            [
                'MaThongBao' => 10,
                'TieuDe' => 'Thông báo chung',
                'NoiDung' => 'Chúc mừng năm mới',
                'LoaiThongBao' => 'đã đọc',
                'NgayTao' => '2025-03-10',
            ],
        ]);
    }
}

