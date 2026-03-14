<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiendodetaiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tiendodetai')->insert([
            [
                'MaTienDo' => 1,
                'MaDeTai' => 1,
                'TenDeTai' => 'AI trong phân tích dữ liệu',
                'TrangThai' => 'Đang thực hiện',
                'ThoiGianCapNhat' => '2024-03-01',
                'FileBaoCao' => 'bc_ai_phan_tich_du_lieu_dot1.pdf',
                'NoiDungBaoCao' => 'Hoàn thành khảo sát bài toán và thu thập bộ dữ liệu thử nghiệm.',
                'KetQua' => 'Xây dựng được bộ dữ liệu chuẩn hoá ban đầu.',
                'KhoKhan' => 'Dữ liệu thực tế còn nhiễu, cần thêm bước tiền xử lý.',
                'TienDoHienTai' => 'Hoàn thành giai đoạn 1',
                'PhanTramTienDo' => 30,
            ],
            [
                'MaTienDo' => 2,
                'MaDeTai' => 1,
                'TenDeTai' => 'AI trong phân tích dữ liệu',
                'TrangThai' => 'Đang thực hiện',
                'ThoiGianCapNhat' => '2024-06-01',
                'FileBaoCao' => 'bc_ai_phan_tich_du_lieu_dot2.pdf',
                'NoiDungBaoCao' => 'Xây dựng mô hình học máy cho bài toán dự báo.',
                'KetQua' => 'Mô hình baseline hoạt động ổn định trên tập dữ liệu thử nghiệm.',
                'KhoKhan' => 'Cần tối ưu thêm siêu tham số để cải thiện độ chính xác.',
                'TienDoHienTai' => 'Hoàn thành giai đoạn 2',
                'PhanTramTienDo' => 60,
            ],
            [
                'MaTienDo' => 3,
                'MaDeTai' => 3,
                'TenDeTai' => 'Phân tích dữ liệu lớn',
                'TrangThai' => 'Đang thực hiện',
                'ThoiGianCapNhat' => '2024-07-15',
                'FileBaoCao' => 'bc_bigdata_dot1.pdf',
                'NoiDungBaoCao' => 'Triển khai cụm Hadoop và Spark phục vụ xử lý dữ liệu lớn.',
                'KetQua' => 'Cụm xử lý hoạt động ổn định, hỗ trợ chạy thử các job phân tán.',
                'KhoKhan' => 'Tối ưu chi phí lưu trữ và tài nguyên tính toán.',
                'TienDoHienTai' => 'Khởi động hệ thống',
                'PhanTramTienDo' => 25,
            ],
            [
                'MaTienDo' => 4,
                'MaDeTai' => 5,
                'TenDeTai' => 'Deep Learning nhận dạng ảnh',
                'TrangThai' => 'Hoàn thành',
                'ThoiGianCapNhat' => '2024-05-20',
                'FileBaoCao' => 'bc_deeplearning_hoan_thanh.pdf',
                'NoiDungBaoCao' => 'Hoàn thiện mô hình CNN và đánh giá trên bộ dữ liệu kiểm thử.',
                'KetQua' => 'Độ chính xác đạt trên 95% với tập kiểm thử độc lập.',
                'KhoKhan' => 'Thời gian huấn luyện mô hình lớn, yêu cầu GPU.',
                'TienDoHienTai' => 'Nghiệm thu đề tài',
                'PhanTramTienDo' => 100,
            ],
            [
                'MaTienDo' => 5,
                'MaDeTai' => 10,
                'TenDeTai' => 'Hệ thống quản lý học tập',
                'TrangThai' => 'Đang thực hiện',
                'ThoiGianCapNhat' => '2024-09-01',
                'FileBaoCao' => 'bc_lms_dot1.pdf',
                'NoiDungBaoCao' => 'Hoàn thành phân tích yêu cầu và thiết kế kiến trúc hệ thống LMS.',
                'KetQua' => 'Biểu đồ use case, kiến trúc lớp và cơ sở dữ liệu cho hệ thống LMS.',
                'KhoKhan' => 'Cần tích hợp với hệ thống quản lý sinh viên hiện hữu.',
                'TienDoHienTai' => 'Thiết kế hệ thống',
                'PhanTramTienDo' => 40,
            ],
        ]);
    }
}

