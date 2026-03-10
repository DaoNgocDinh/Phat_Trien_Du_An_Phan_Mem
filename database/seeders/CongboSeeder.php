<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CongboSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('congbo')->insert([
            [
                'MaCongBo' => 1,
                'TenCongBo' => 'AI Research',
                'TacGia' => 'Nguyễn Văn An',
                'NamXuatBan' => 2024,
                'NoiCongBo' => 'IEEE',
                'LoaiCongBo' => 'Journal',
                'DOI' => '10.1001/ai',
                'FilePDF' => 'cb1.pdf',
                'NoiDungTomTat' => 'Nghiên cứu AI',
            ],
            [
                'MaCongBo' => 2,
                'TenCongBo' => 'Blockchain Study',
                'TacGia' => 'Trần Minh Hùng',
                'NamXuatBan' => 2023,
                'NoiCongBo' => 'Springer',
                'LoaiCongBo' => 'Journal',
                'DOI' => '10.1002/bc',
                'FilePDF' => 'cb2.pdf',
                'NoiDungTomTat' => 'Blockchain',
            ],
            [
                'MaCongBo' => 3,
                'TenCongBo' => 'Data Mining',
                'TacGia' => 'Lê Thu Hà',
                'NamXuatBan' => 2024,
                'NoiCongBo' => 'Elsevier',
                'LoaiCongBo' => 'Conference',
                'DOI' => '10.1003/dm',
                'FilePDF' => 'cb3.pdf',
                'NoiDungTomTat' => 'Data mining',
            ],
            [
                'MaCongBo' => 4,
                'TenCongBo' => 'IoT Smart Farm',
                'TacGia' => 'Phạm Quang Dũng',
                'NamXuatBan' => 2023,
                'NoiCongBo' => 'ACM',
                'LoaiCongBo' => 'Journal',
                'DOI' => '10.1004/iot',
                'FilePDF' => 'cb4.pdf',
                'NoiDungTomTat' => 'IoT',
            ],
            [
                'MaCongBo' => 5,
                'TenCongBo' => 'Deep Learning',
                'TacGia' => 'Đặng Minh Tuấn',
                'NamXuatBan' => 2024,
                'NoiCongBo' => 'IEEE',
                'LoaiCongBo' => 'Journal',
                'DOI' => '10.1005/dl',
                'FilePDF' => 'cb5.pdf',
                'NoiDungTomTat' => 'Deep learning',
            ],
            [
                'MaCongBo' => 6,
                'TenCongBo' => 'Security Web',
                'TacGia' => 'Phạm Thanh Long',
                'NamXuatBan' => 2023,
                'NoiCongBo' => 'ACM',
                'LoaiCongBo' => 'Conference',
                'DOI' => '10.1006/sec',
                'FilePDF' => 'cb6.pdf',
                'NoiDungTomTat' => 'Security',
            ],
            [
                'MaCongBo' => 7,
                'TenCongBo' => 'Cloud System',
                'TacGia' => 'Lý Văn Đức',
                'NamXuatBan' => 2024,
                'NoiCongBo' => 'IEEE',
                'LoaiCongBo' => 'Journal',
                'DOI' => '10.1007/cloud',
                'FilePDF' => 'cb7.pdf',
                'NoiDungTomTat' => 'Cloud',
            ],
            [
                'MaCongBo' => 8,
                'TenCongBo' => 'Chatbot NLP',
                'TacGia' => 'Trần Quốc Bảo',
                'NamXuatBan' => 2023,
                'NoiCongBo' => 'Springer',
                'LoaiCongBo' => 'Conference',
                'DOI' => '10.1008/nlp',
                'FilePDF' => 'cb8.pdf',
                'NoiDungTomTat' => 'Chatbot',
            ],
            [
                'MaCongBo' => 9,
                'TenCongBo' => 'BigData',
                'TacGia' => 'Nguyễn Hoàng Nam',
                'NamXuatBan' => 2024,
                'NoiCongBo' => 'Elsevier',
                'LoaiCongBo' => 'Journal',
                'DOI' => '10.1009/bd',
                'FilePDF' => 'cb9.pdf',
                'NoiDungTomTat' => 'BigData',
            ],
            [
                'MaCongBo' => 10,
                'TenCongBo' => 'LMS System',
                'TacGia' => 'Nguyễn Văn An',
                'NamXuatBan' => 2024,
                'NoiCongBo' => 'IEEE',
                'LoaiCongBo' => 'Conference',
                'DOI' => '10.1010/lms',
                'FilePDF' => 'cb10.pdf',
                'NoiDungTomTat' => 'Hệ thống LMS',
            ],
        ]);
    }
}

