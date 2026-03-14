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
                'TenCongBo' => 'Nghiên cứu về AI trong giáo dục',
                'TacGia' => 'Nguyễn Việt Anh',
                'NamXuatBan' => 2017,
                'NoiCongBo' => 'Tạp chí Khoa học Giáo dục',
                'LoaiCongBo' => 'Bài báo',
                'TrangThai' => 'Từ chối',
                'DOI' => '10.1001/ai-edu',
                'FilePDF' => 'cb1.pdf',
                'NoiDungTomTat' => 'Ứng dụng AI hỗ trợ phân tích và cá nhân hoá học tập.',
                'TrangThai' => 'Chờ Duyệt'
            ],
            [
                'MaCongBo' => 2,
                'TenCongBo' => 'Ứng dụng IoT trong y tế',
                'TacGia' => 'Nguyễn Thành Long',
                'NamXuatBan' => 2026,
                'NoiCongBo' => 'Hội nghị Công nghệ Y sinh',
                'LoaiCongBo' => 'Bài báo',
                'TrangThai' => 'Chờ duyệt',
                'DOI' => '10.1002/iot-health',
                'FilePDF' => 'cb2.pdf',
                'NoiDungTomTat' => 'Giám sát bệnh nhân từ xa với cảm biến và nền tảng IoT.',
                'TrangThai' => 'Chờ Duyệt'
            ],
            [
                'MaCongBo' => 3,
                'TenCongBo' => 'Phân tích hình ảnh y sinh',
                'TacGia' => 'Trần Khánh Linh',
                'NamXuatBan' => 2000,
                'NoiCongBo' => 'Hội thảo Tin sinh học',
                'LoaiCongBo' => 'Hội thảo',
                'TrangThai' => 'Đã duyệt',
                'DOI' => '10.1003/bioimg',
                'FilePDF' => 'cb3.pdf',
                'NoiDungTomTat' => 'Trích xuất đặc trưng ảnh y sinh phục vụ chẩn đoán hỗ trợ.',
                'TrangThai' => 'Chờ Duyệt'
            ],
            [
                'MaCongBo' => 4,
                'TenCongBo' => 'Deep learning nhận diện ảnh',
                'TacGia' => 'Tạ Quang Mạnh',
                'NamXuatBan' => 2026,
                'NoiCongBo' => 'NXB Khoa học & Kỹ thuật',
                'LoaiCongBo' => 'Sách',
                'TrangThai' => 'Từ chối',
                'DOI' => '10.1004/dl-vision',
                'FilePDF' => 'cb4.pdf',
                'NoiDungTomTat' => 'Tổng quan mô hình học sâu cho bài toán nhận diện ảnh.',
                'TrangThai' => 'Chờ Duyệt'
            ],
            [
                'MaCongBo' => 5,
                'TenCongBo' => 'Nghiên cứu thủy điện',
                'TacGia' => 'Phan Việt Đức',
                'NamXuatBan' => 2025,
                'NoiCongBo' => 'Tạp chí Năng lượng',
                'LoaiCongBo' => 'Tạp chí',
                'TrangThai' => 'Đã duyệt',
                'DOI' => '10.1005/hydro',
                'FilePDF' => 'cb5.pdf',
                'NoiDungTomTat' => 'Mô hình dự báo và tối ưu vận hành hệ thống thủy điện.',
                'TrangThai' => 'Chờ Duyệt'
            ],
            [
                'MaCongBo' => 6,
                'TenCongBo' => 'Nghiên cứu Flutter trong y tế',
                'TacGia' => 'Nguyễn Văn Duy',
                'NamXuatBan' => 2026,
                'NoiCongBo' => 'Hội thảo Ứng dụng Di động',
                'LoaiCongBo' => 'Hội thảo',
                'TrangThai' => 'Chờ duyệt',
                'DOI' => '10.1006/flutter-health',
                'FilePDF' => 'cb6.pdf',
                'NoiDungTomTat' => 'Ứng dụng Flutter cho hệ thống khám bệnh và đặt lịch.',
                'TrangThai' => 'Chờ Duyệt'
            ],
            [
                'MaCongBo' => 7,
                'TenCongBo' => 'Phân tích dữ liệu lớn',
                'TacGia' => 'Trần Thị Mai',
                'NamXuatBan' => 2020,
                'NoiCongBo' => 'Tạp chí Công nghệ Thông tin',
                'LoaiCongBo' => 'Bài báo',
                'TrangThai' => 'Đã duyệt',
                'DOI' => '10.1007/bigdata',
                'FilePDF' => 'cb7.pdf',
                'NoiDungTomTat' => 'Khung xử lý dữ liệu lớn phục vụ phân tích nghiên cứu.',
                'TrangThai' => 'Chờ Duyệt'
            ],
            [
                'MaCongBo' => 8,
                'TenCongBo' => 'Nghiên cứu Flutter trong y tế',
                'TacGia' => 'Nguyễn Thành Long',
                'NamXuatBan' => 2026,
                'NoiCongBo' => 'Hội thảo Ứng dụng Di động',
                'LoaiCongBo' => 'Hội thảo',
                'TrangThai' => 'Chờ duyệt',
                'DOI' => '10.1008/flutter-health-2',
                'FilePDF' => 'cb8.pdf',
                'NoiDungTomTat' => 'Mở rộng tính năng quản lý hồ sơ và nhắc lịch tái khám.',
                'TrangThai' => 'Chờ Duyệt'
            ],
            [
                'MaCongBo' => 9,
                'TenCongBo' => 'Tối ưu hóa thuật toán',
                'TacGia' => 'Vũ Tiến Đạt',
                'NamXuatBan' => 1999,
                'NoiCongBo' => 'NXB Đại học Quốc gia',
                'LoaiCongBo' => 'Sách',
                'TrangThai' => 'Chờ duyệt',
                'DOI' => '10.1009/opt-algo',
                'FilePDF' => 'cb9.pdf',
                'NoiDungTomTat' => 'Các kỹ thuật tối ưu hoá thuật toán trong bài toán khoa học dữ liệu.',
                'TrangThai' => 'Chờ Duyệt'
            ],
            [
                'MaCongBo' => 10,
                'TenCongBo' => 'Phân tích dữ liệu lớn',
                'TacGia' => 'Đinh Thu Hương',
                'NamXuatBan' => 2018,
                'NoiCongBo' => 'Tạp chí Khoa học Dữ liệu',
                'LoaiCongBo' => 'Tạp chí',
                'TrangThai' => 'Đã duyệt',
                'DOI' => '10.1010/bigdata-2',
                'FilePDF' => 'cb10.pdf',
                'NoiDungTomTat' => 'Ứng dụng khai phá dữ liệu lớn cho quản lý nghiên cứu khoa học.',
                'TrangThai' => 'Chờ Duyệt'
            ],
        ]);
    }
}

