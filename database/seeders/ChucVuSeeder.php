<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chucvus = [
            ['TenChucVu' => 'Giảng viên', 'MoTa' => 'Giảng viên cơ hữu'],
            ['TenChucVu' => 'Trợ giảng', 'MoTa' => 'Trợ giảng'],
            ['TenChucVu' => 'Giảng viên thỉnh giảng', 'MoTa' => 'Giảng viên thỉnh giảng'],
            ['TenChucVu' => 'Tiến sĩ', 'MoTa' => 'Giảng viên có học vị tiến sĩ'],
            ['TenChucVu' => 'PGS.TS', 'MoTa' => 'Phó giáo sư - Tiến sĩ'],
            ['TenChucVu' => 'GS.TS', 'MoTa' => 'Giáo sư - Tiến sĩ'],
        ];

        foreach ($chucvus as $chucvu) {
            \DB::table('chucvu')->insert($chucvu);
        }
    }
}
