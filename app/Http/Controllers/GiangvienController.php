<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongBo;
use App\Models\Detai;
use App\Models\Sukien;


class GiangVienController extends Controller
{
    //
    public function dashBoard()
    {
        return view('Giangvien.trangChu');
    }
    public function CongBo()
    {
        $congbos = CongBo::latest()->paginate(10); 
        return view('Giangvien.congBo', compact('congbos'));
    }
    public function DeTai()
    {
        $detais = Detai::latest()->paginate(10);
        return view('Giangvien.deTai', compact('detais'));
    }

    public function SuKien()
    {
        $sukiens = Sukien::latest()->paginate(10);
        return view('Giangvien.suKien', compact('sukiens'));
    }
}
