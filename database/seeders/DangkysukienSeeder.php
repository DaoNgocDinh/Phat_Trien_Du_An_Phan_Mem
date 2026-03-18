<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DangkysukienSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dangkysukien')->insert([
            [
                'MaDangky' => 1,
                'MaSuKien' => 1,
                'UserID' => 11,
                'SoLuongDangKy' => 1,
                'ThoiGianDangKy' => '2025-04-01',
            ],
            [
                'MaDangky' => 2,
                'MaSuKien' => 1,
                'UserID' => 12,
                'SoLuongDangKy' => 1,
                'ThoiGianDangKy' => '2025-04-02',
            ],
            [
                'MaDangky' => 3,
                'MaSuKien' => 2,
                'UserID' => 13,
                'SoLuongDangKy' => 1,
                'ThoiGianDangKy' => '2025-04-03',
            ],
            [
                'MaDangky' => 4,
                'MaSuKien' => 2,
                'UserID' => 14,
                'SoLuongDangKy' => 1,
                'ThoiGianDangKy' => '2025-04-04',
            ],
            [
                'MaDangky' => 5,
                'MaSuKien' => 3,
                'UserID' => 15,
                'SoLuongDangKy' => 1,
                'ThoiGianDangKy' => '2025-04-05',
            ],
            [
                'MaDangky' => 6,
                'MaSuKien' => 4,
                'UserID' => 16,
                'SoLuongDangKy' => 1,
                'ThoiGianDangKy' => '2025-04-06',
            ],
            [
                'MaDangky' => 7,
                'MaSuKien' => 5,
                'UserID' => 17,
                'SoLuongDangKy' => 1,
                'ThoiGianDangKy' => '2025-04-07',
            ],
            [
                'MaDangky' => 8,
                'MaSuKien' => 6,
                'UserID' => 18,
                'SoLuongDangKy' => 1,
                'ThoiGianDangKy' => '2025-04-08',
            ],
            [
                'MaDangky' => 9,
                'MaSuKien' => 7,
                'UserID' => 19,
                'SoLuongDangKy' => 1,
                'ThoiGianDangKy' => '2025-04-09',
            ],
            [
                'MaDangky' => 10,
                'MaSuKien' => 8,
                'UserID' => 20,
                'SoLuongDangKy' => 1,
                'ThoiGianDangKy' => '2025-04-10',
            ],
        ]);
    }
}

