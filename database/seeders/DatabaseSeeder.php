<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KhoaSeeder::class,
            ChucVuSeeder::class,
            TaikhoanSeeder::class,
            GiangvienSeeder::class,
            NghiencuusinhSeeder::class,
            CanbokhoahocSeeder::class,
            LoaiDeTaisSeeder::class,
            DetaiSeeder::class,
            TiendodetaiSeeder::class,
            SukienSeeder::class,
            DangkysukienSeeder::class,
            CongboSeeder::class,
            QuycheSeeder::class,
            LienheSeeder::class,
            ThongbaoSeeder::class,
        ]);
        
    }
}
