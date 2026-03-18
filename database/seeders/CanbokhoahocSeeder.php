<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CanbokhoahocSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('canbokhoahoc')->insert([
            [
                'MaCanBo_admin' => 1,
                'UserID' => 1,
                'PhongBan' => 'Phòng Quản lý Khoa học',
                'ChucVu' => 'Trưởng phòng',
                'HocVi' => 'TS',
                'TrangThai' => 'Đang công tác',
            ],
            [
                'MaCanBo_admin' => 2,
                'UserID' => 2,
                'PhongBan' => 'Phòng Quản lý Khoa học',
                'ChucVu' => 'Chuyên viên',
                'HocVi' => 'ThS',
                'TrangThai' => 'Đang công tác',
            ],
            [
                'MaCanBo_admin' => 3,
                'UserID' => 3,
                'PhongBan' => 'Trung tâm Nghiên cứu AI',
                'ChucVu' => 'Giám đốc trung tâm',
                'HocVi' => 'TS',
                'TrangThai' => 'Đang công tác',
            ],
            [
                'MaCanBo_admin' => 4,
                'UserID' => 4,
                'PhongBan' => 'Trung tâm Dữ liệu lớn',
                'ChucVu' => 'Phó giám đốc',
                'HocVi' => 'TS',
                'TrangThai' => 'Đang công tác',
            ],
            [
                'MaCanBo_admin' => 5,
                'UserID' => 5,
                'PhongBan' => 'Phòng Hợp tác Khoa học',
                'ChucVu' => 'Chuyên viên',
                'HocVi' => 'ThS',
                'TrangThai' => 'Đang công tác',
            ],
        ]);
    }
}

