<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongBo;


class GiangVienController extends Controller
{
    //
    public function index()
    {
        $congbos = CongBo::latest()->paginate(10); // hoặc lọc theo trạng thái 'Đã duyệt' nếu cần
        return view('Giangvien.congBo', compact('congbos'));
    }
}
