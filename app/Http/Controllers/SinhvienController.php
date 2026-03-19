<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongBo;

class SinhvienController extends Controller
{
    //
    public function dashBoard()
    {
        return view('sinhVien.trangChu');
    }
    public function CongBo()
    {
        $congbos = CongBo::latest()->paginate(10); // hoặc lọc theo trạng thái 'Đã duyệt' nếu cần
        return view('sinhVien.congBo', compact('congbos'));
    }
}
