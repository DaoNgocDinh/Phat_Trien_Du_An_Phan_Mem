<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lienhe;
use App\Models\Quyche;
use App\Models\CongBo;
use App\Models\DeTai;
use App\Models\Sukien;
use App\Models\Thongbao;

class AdminController extends Controller
{
    //
    public function dashBoard()
    {
        $soluong = Lienhe::where('TrangThai', 'Chưa đọc')->count();

        return view('Admin.trangChu', compact('soluong'));
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

        $lienhe = Lienhe::select(
            'MaLienHe as Ma',
            'ChuDe as Ten',
            Lienhe::raw("'Liên hệ' as Loai")
        );

        if ($search) {
            $lienhe->where('ChuDe', 'like', "%{$search}%");
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
            CongBo::raw("'Sự kiện' as Loai")
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
            ->unionAll($lienhe)
            ->unionAll($congbo)
            ->unionAll($detai)
            ->unionAll($sukien)
            ->unionAll($thongbao)
            ->get(); // lấy tất cả vào collection

        // Thêm filter thực sự
        if ($filter) {
            $results = $results->filter(fn($item) => $item->Loai === $filter);
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

        return view('Admin.search.index', ['results' => $paginated]);
    }
    // --- QUẢN LÝ SỰ KIỆN ---

    public function suKienIndex()
    {
        // Lấy danh sách sự kiện kèm tổng số lượng đăng ký
        $sukiens = Sukien::withSum('dangkysukien as tong_dang_ky', 'SoLuongDangKy')
                         ->orderBy('ThoiGian', 'desc')
                         ->paginate(10);
                         
        return view('Admin.sukien.index', compact('sukiens'));
    }

    public function suKienStore(Request $request)
    {
        $request->validate([
            'TenSuKien' => 'required',
            'ThoiGian' => 'required|date',
        ]);

        $maxId = Sukien::max('MaSuKien');
        $newId = $maxId ? $maxId + 1 : 1;

        Sukien::create([
            'MaSuKien' => $newId,
            'TenSuKien' => $request->TenSuKien,
            'MoTa' => $request->MoTa,
            'DiaDiem' => $request->DiaDiem,
            'ThoiGian' => $request->ThoiGian,
            'HinhThuc' => $request->HinhThuc,
            'SoLuongToiDa' => $request->SoLuongToiDa,
        ]);

        return back()->with('success', 'Thêm sự kiện thành công!');
    }

    public function suKienUpdate(Request $request, $id)
    {
        $sukien = Sukien::findOrFail($id);
        
        $sukien->update([
            'TenSuKien' => $request->TenSuKien,
            'MoTa' => $request->MoTa,
            'DiaDiem' => $request->DiaDiem,
            'ThoiGian' => $request->ThoiGian,
            'HinhThuc' => $request->HinhThuc,
            'SoLuongToiDa' => $request->SoLuongToiDa,
        ]);

        return back()->with('success', 'Cập nhật sự kiện thành công!');
    }

    public function suKienDestroy($id)
    {
        // Cần xóa các bản ghi đăng ký liên quan trong bảng dangkysukien trước để tránh lỗi khóa ngoại (Foreign Key)
        \App\Models\Dangkysukien::where('MaSuKien', $id)->delete();
        
        // Sau đó mới xóa sự kiện
        Sukien::where('MaSuKien', $id)->delete();

        return back()->with('success', 'Xóa sự kiện thành công!');
    }
}
