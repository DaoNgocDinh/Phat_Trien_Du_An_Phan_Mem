<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongBo;
use App\Models\DeTai;

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

    public function DeTai()
    {
        $detais = DeTai::latest()->paginate(10); // hoặc lọc theo trạng thái 'Đã duyệt' nếu cần
        return view('Sinhvien.deTai', compact('detais'));
    }
    public function SuKien()
    {
        // Cần withSum để lấy được tổng lượng đăng ký hiện tại truyền ra Modal cho Khách xem
        $sukiens = \App\Models\Sukien::withSum('dangkysukien as tong_dang_ky', 'SoLuongDangKy')
                        ->latest()
                        ->paginate(10);
                        
        return view('Sinhvien.suKien', compact('sukiens'));
    }
    public function lienHe()
    {
        return view('Sinhvien.lienHe');
    }
}
