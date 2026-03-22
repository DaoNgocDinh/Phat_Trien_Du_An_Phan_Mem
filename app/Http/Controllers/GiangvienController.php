<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quyche;
use App\Models\CongBo;
use App\Models\DeTai;
use App\Models\Sukien;
use App\Models\Thongbao;


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

        $thongbao = Thongbao::select(
            'MaThongBao as Ma',
            'TieuDe as Ten',
            Thongbao::raw("'Thông báo' as Loai")
        );

        if ($search) {
            $thongbao->where('TieuDe', 'like', "%{$search}%");
        }

        $results = $quyche
            ->unionAll($congbo)
            ->unionAll($detai)
            ->unionAll($sukien)
            ->unionAll($thongbao)
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
        $sukiens = Sukien::latest()->paginate(10);
        return view('Giangvien.suKien', compact('sukiens'));
    }
}
