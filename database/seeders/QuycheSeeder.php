<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuycheSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('quyche')->insert([
            [
                'MaQuyChe' => 1,
                'TenVanBan' => 'Quy chế nghiên cứu khoa học',
                'SoHieu' => 'QC01',
                'NgayBanHanh' => '2023-01-01',
                'LoaiVanBan' => 'Nội bộ',
                'FilePDF' => 'qc1.pdf',
            ],
            [
                'MaQuyChe' => 2,
                'TenVanBan' => 'Quy định đề tài cấp trường',
                'SoHieu' => 'QC02',
                'NgayBanHanh' => '2023-02-01',
                'LoaiVanBan' => 'Nội bộ',
                'FilePDF' => 'qc2.pdf',
            ],
            [
                'MaQuyChe' => 3,
                'TenVanBan' => 'Quy chế công bố khoa học',
                'SoHieu' => 'QC03',
                'NgayBanHanh' => '2023-03-01',
                'LoaiVanBan' => 'Nội bộ',
                'FilePDF' => 'qc3.pdf',
            ],
            [
                'MaQuyChe' => 4,
                'TenVanBan' => 'Quy định hội thảo',
                'SoHieu' => 'QC04',
                'NgayBanHanh' => '2023-04-01',
                'LoaiVanBan' => 'Nội bộ',
                'FilePDF' => 'qc4.pdf',
            ],
            [
                'MaQuyChe' => 5,
                'TenVanBan' => 'Quy chế bảo mật',
                'SoHieu' => 'QC05',
                'NgayBanHanh' => '2023-05-01',
                'LoaiVanBan' => 'Nội bộ',
                'FilePDF' => 'qc5.pdf',
            ],
            [
                'MaQuyChe' => 6,
                'TenVanBan' => 'Quy định tài chính',
                'SoHieu' => 'QC06',
                'NgayBanHanh' => '2023-06-01',
                'LoaiVanBan' => 'Nội bộ',
                'FilePDF' => 'qc6.pdf',
            ],
            [
                'MaQuyChe' => 7,
                'TenVanBan' => 'Quy chế quản lý đề tài',
                'SoHieu' => 'QC07',
                'NgayBanHanh' => '2023-07-01',
                'LoaiVanBan' => 'Nội bộ',
                'FilePDF' => 'qc7.pdf',
            ],
            [
                'MaQuyChe' => 8,
                'TenVanBan' => 'Quy định nghiệm thu',
                'SoHieu' => 'QC08',
                'NgayBanHanh' => '2023-08-01',
                'LoaiVanBan' => 'Nội bộ',
                'FilePDF' => 'qc8.pdf',
            ],
        ]);
    }
}

