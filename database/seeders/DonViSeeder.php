<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonViSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('don_vis')->insert([
        ['id' => 1, 'ten_don_vi' => 'CNTT'],
        ['id' => 2, 'ten_don_vi' => 'HTTT'],
        ['id' => 3, 'ten_don_vi' => 'AI'],
    ]);
    }
}
