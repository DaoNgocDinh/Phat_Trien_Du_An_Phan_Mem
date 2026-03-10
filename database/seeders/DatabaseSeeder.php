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
            TaikhoanSeeder::class,
            GiangvienSeeder::class,
            NghiencuusinhSeeder::class,
            DetaiSeeder::class,
            SukienSeeder::class,
            DangkysukienSeeder::class,
            CongboSeeder::class,
            QuycheSeeder::class,
            LienheSeeder::class,
            ThongbaoSeeder::class,
        ]);
    }
}
