<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KhoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $khoas = [
            ['TenKhoa' => 'Công nghệ thông tin', 'MoTa' => 'Khoa Công nghệ thông tin'],
            ['TenKhoa' => 'Kỹ thuật điện tử', 'MoTa' => 'Khoa Kỹ thuật điện tử'],
            ['TenKhoa' => 'Kỹ thuật cơ khí', 'MoTa' => 'Khoa Kỹ thuật cơ khí'],
            ['TenKhoa' => 'Kinh tế', 'MoTa' => 'Khoa Kinh tế'],
            ['TenKhoa' => 'Ngoại ngữ', 'MoTa' => 'Khoa Ngoại ngữ'],
        ];

        foreach ($khoas as $khoa) {
            \DB::table('khoa')->insert($khoa);
        }
    }
}
