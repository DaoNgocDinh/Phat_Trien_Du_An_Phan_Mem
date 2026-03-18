<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    
        $this->call([
            TaikhoanSeeder::class,
            GiangvienSeeder::class,
            NghiencuusinhSeeder::class,
            CanbokhoahocSeeder::class,
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
