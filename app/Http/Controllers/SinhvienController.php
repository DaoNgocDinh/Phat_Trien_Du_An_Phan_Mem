<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongBo;

class SinhvienController extends Controller
{
    //
    public function dashBoard()
    {
        return view('Sinhvien.trangChu');
    }
    public function CongBo()
    {
        $congbos = CongBo::latest()->paginate(10); // hoặc lọc theo trạng thái 'Đã duyệt' nếu cần
        return view('Sinhvien.congBo', compact('congbos'));
    }
}
