<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CongBo;  // Giả sử bạn đã tạo model CongBo
use Illuminate\Http\Request;

class CongBoController extends Controller
{
    //
    public function show()
    {
        // Bảng `congbo` không có cột timestamps, sắp xếp theo năm xuất bản mới nhất
        $congbos = CongBo::orderByDesc('NamXuatBan')->paginate(10);

        // Truyền dữ liệu sang view
        return view('admin.congbo.index', compact('congbos'));
    }
}
