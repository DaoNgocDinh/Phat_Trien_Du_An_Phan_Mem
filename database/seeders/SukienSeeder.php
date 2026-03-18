<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SukienSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sukien')->insert([
            [
                'MaSuKien' => 1,
                'TenSuKien' => 'Hội thảo AI',
                'MoTa' => 'Chia sẻ về AI',
                'DiaDiem' => 'Hà Nội',
                'ThoiGian' => '2025-05-10',
                'HinhThuc' => 'offline',
                'SoLuongToiDa' => 200,
            ],
            [
                'MaSuKien' => 2,
                'TenSuKien' => 'Workshop Data',
                'MoTa' => 'Khoa học dữ liệu',
                'DiaDiem' => 'Hà Nội',
                'ThoiGian' => '2025-06-10',
                'HinhThuc' => 'offline',
                'SoLuongToiDa' => 150,
            ],
            [
                'MaSuKien' => 3,
                'TenSuKien' => 'Seminar Blockchain',
                'MoTa' => 'Blockchain',
                'DiaDiem' => 'Online',
                'ThoiGian' => '2025-07-10',
                'HinhThuc' => 'online',
                'SoLuongToiDa' => 300,
            ],
            [
                'MaSuKien' => 4,
                'TenSuKien' => 'Talkshow Startup',
                'MoTa' => 'Khởi nghiệp',
                'DiaDiem' => 'HCM',
                'ThoiGian' => '2025-08-10',
                'HinhThuc' => 'offline',
                'SoLuongToiDa' => 250,
            ],
            [
                'MaSuKien' => 5,
                'TenSuKien' => 'AI Hackathon',
                'MoTa' => 'Cuộc thi AI',
                'DiaDiem' => 'Đà Nẵng',
                'ThoiGian' => '2025-09-10',
                'HinhThuc' => 'offline',
                'SoLuongToiDa' => 100,
            ],
            [
                'MaSuKien' => 6,
                'TenSuKien' => 'Cloud Seminar',
                'MoTa' => 'Cloud computing',
                'DiaDiem' => 'Online',
                'ThoiGian' => '2025-10-10',
                'HinhThuc' => 'online',
                'SoLuongToiDa' => 200,
            ],
            [
                'MaSuKien' => 7,
                'TenSuKien' => 'Security Conference',
                'MoTa' => 'An toàn thông tin',
                'DiaDiem' => 'Hà Nội',
                'ThoiGian' => '2025-11-10',
                'HinhThuc' => 'offline',
                'SoLuongToiDa' => 180,
            ],
            [
                'MaSuKien' => 8,
                'TenSuKien' => 'Tech Expo',
                'MoTa' => 'Triển lãm công nghệ',
                'DiaDiem' => 'HCM',
                'ThoiGian' => '2025-12-10',
                'HinhThuc' => 'offline',
                'SoLuongToiDa' => 500,
            ],
        ]);
    }
}

