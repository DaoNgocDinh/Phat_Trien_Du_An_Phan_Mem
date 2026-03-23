<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiDeTaisSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('loai_de_tais')->insert([
            [
                'id' => 1,
                'ten_loai' => 'Test',
            ],
            [
                'id' => 2,
                'ten_loai' => 'Nghiên cứu',
            ],
            [
                'id' => 3,
                'ten_loai' => 'Ứng dụng',
            ],
        ]);
    }
}