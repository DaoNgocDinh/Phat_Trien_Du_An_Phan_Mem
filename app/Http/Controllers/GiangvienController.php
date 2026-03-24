<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quyche;
use App\Models\CongBo;
use App\Models\DeTai;
use App\Models\Sukien;
use App\Models\Dangkysukien;
use Carbon\Carbon;

class GiangVienController extends Controller
{
    //
    public function dashBoard()
    {
        return view('Giangvien.trangChu');
    }

    public function search(Request $request)
    {

        $search = $request->search;
        $filter = $request->filter; // Lấy giá trị filter nếu có


        $quyche = Quyche::select(
            'MaQuyChe as Ma',
            'TenVanBan as Ten',
            Quyche::raw("'Quy chế' as Loai")
        );

        if ($search) {
            $quyche->where('TenVanBan', 'like', "%{$search}%");
        }

        $congbo = CongBo::select(
            'MaCongBo as Ma',
            'TenCongBo as Ten',
            CongBo::raw("'Công bố' as Loai")
        );

        if ($search) {
            $congbo->where('TenCongBo', 'like', "%{$search}%");
        }

        $detai = DeTai::select(
            'MaSo as Ma',
            'TenDeTai as Ten',
            DeTai::raw("'Đề tài' as Loai")
        );

        if ($search) {
            $detai->where('TenDeTai', 'like', "%{$search}%");
        }

        $sukien = Sukien::select(
            'MaSuKien as Ma',
            'TenSuKien as Ten',
            Sukien::raw("'Sự kiện' as Loai")
        );

        if ($search) {
            $sukien->where('TenSuKien', 'like', "%{$search}%");
        }


        $results = $quyche
            ->unionAll($congbo)
            ->unionAll($detai)
            ->unionAll($sukien)
            ->get(); // lấy tất cả vào collection

        // Thêm filter thực sự
        if ($filter) {
            $results = $results->filter(function ($item) use ($filter) {
                return strtolower($item->Loai) === strtolower($filter);
            });
        }

        // Phân trang thủ công
        $page = request()->get('page', 1);
        $perPage = 10;
        $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $results->forPage($page, $perPage),
            $results->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('giangvien.search.index', ['results' => $paginated]);
    }
    public function CongBo()
    {
        $congbos = CongBo::latest()->paginate(10);
        return view('Giangvien.congbo.congBo', compact('congbos'));
    }
    public function DeTai()
    {
        $detais = Detai::latest()->paginate(10);
        return view('Giangvien.detai.deTai', compact('detais'));
    }

    public function DeTaiCuaToi()
    {
        $hoTen = session('HoTen');
        $deTaiCuaToi = Detai::where('ChuNhiem', $hoTen)->latest()->paginate(10);
        return view('Giangvien.detai.deTaiCuaToi', compact('deTaiCuaToi'));
    }

    public function SuKien()
    {
        $sukiens = Sukien::withSum('dangkysukien as tong_dang_ky', 'SoLuongDangKy')
            ->latest()
            ->paginate(10);

        return view('Giangvien.suKien', compact('sukiens'));
    }

    // Hàm lưu đăng ký vào DB
    public function dangKySuKien(Request $request)
    {
        $maSuKien = $request->maSuKien;
        // Lấy ID người dùng (Tùy theo cấu hình session của bạn)
        $userId = session('UserID') ?? auth()->id() ?? 1; 

        // Kiểm tra xem đã đăng ký chưa
        $exists = Dangkysukien::where('MaSuKien', $maSuKien)->where('UserID', $userId)->first();
        
        if (!$exists) {
            $maxId = Dangkysukien::max('MaDangky');
            Dangkysukien::create([
                'MaDangky'       => $maxId ? $maxId + 1 : 1,
                'MaSuKien'       => $maSuKien,
                'UserID'         => $userId,
                'SoLuongDangKy'  => 1, // Mỗi lần bấm là 1 người
                'ThoiGianDangKy' => Carbon::now(),
            ]);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    // Hàm xóa đăng ký khỏi DB
    public function huyDangKySuKien(Request $request)
    {
        $maSuKien = $request->maSuKien;
        $userId = session('UserID') ?? auth()->id() ?? 1;

        Dangkysukien::where('MaSuKien', $maSuKien)->where('UserID', $userId)->delete();

        return response()->json(['success' => true]);
    }
}
