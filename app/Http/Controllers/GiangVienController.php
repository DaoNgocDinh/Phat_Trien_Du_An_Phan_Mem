<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongBo;
use App\Models\Detai;


class GiangVienController extends Controller
{
    //
    public function dashBoard()
    {
        return view('Giangvien.trangChu');
    }
    public function CongBo()
    {
        $congbos = CongBo::latest()->paginate(10); // hoặc lọc theo trạng thái 'Đã duyệt' nếu cần
        return view('Giangvien.congBo', compact('congbos'));
    }
    public function DeTai()
    {
        $detais = Detai::latest()->paginate(10); // hoặc lọc theo trạng thái 'Đã duyệt' nếu cần
        return view('Giangvien.deTai', compact('detais'));
    }
}
