<?php

namespace App\Http\Controllers;

use App\Models\Giangvien;
use Illuminate\Http\Request;
use App\Models\Detai;
use App\Models\Tiendodetai;
use Illuminate\Support\Facades\DB;

class TienDoDeTaiController extends Controller
{
    //// Danh sách đề tài
    public function index()
    {
        $detai = DB::table('detai')
            ->leftJoin('tiendodetai as td', function ($join) {
                $join->on('detai.MaSo', '=', 'td.MaDeTai')
                    ->whereRaw('td.ThoiGianCapNhat = (
                    SELECT MAX(t2.ThoiGianCapNhat)
                    FROM tiendodetai t2
                    WHERE t2.MaDeTai = detai.MaSo
                )');
            })
            ->select(
                'detai.*',
                'td.TienDoHienTai as TrangThaiTienDo'
            )
            ->get();

        return view('Admin.theodoitiendo.index', compact('detai'));
    }


    // Chi tiết tiến độ
    public function getData($MaDeTai)
    {

        $detai = Detai::where('MaSo', $MaDeTai)->first();

        $tiendo = Tiendodetai::where('MaDeTai', $MaDeTai)
            ->orderBy('ThoiGianCapNhat', 'desc')
            ->get();

        return response()->json([
            'detai' => $detai,
            'tiendo' => $tiendo
        ]);
    }

    // Chi tiết tiến độ
    public function show($id)
    {
        $detai = Detai::where('MaSo', $id)->first();

        $tiendo = Tiendodetai::where('MaDeTai', $id)
            ->orderBy('ThoiGianCapNhat', 'desc')
            ->get();

        // lấy lần cập nhật gần nhất
        $lanGanNhat = $tiendo->first();

        return response()->json([
            'detai' => $detai,
            'tiendo' => $tiendo,
            'ganNhat' => $lanGanNhat
        ]);
    }


    // Cập nhật tiến độ
    public function capNhatTienDo(Request $request)
    {
        // tìm bản ghi tiến độ của đề tài
        $tiendo = Tiendodetai::where('MaDeTai', $request->MaDeTai)->first();

        if ($tiendo) {
            // ✅ đã có → update
            $tiendo->update([
                'TienDoHienTai' => $request->TrangThai,
                'ThoiGianCapNhat' => now()
            ]);
        } else {
            // ❗ chưa có → tạo mới (lần đầu)
            $maxId = Tiendodetai::max('MaTienDo');
            $newId = $maxId ? $maxId + 1 : 1;

            $tiendo = Tiendodetai::create([
                'MaTienDo' => $newId,
                'MaDeTai' => $request->MaDeTai,
                'TienDoHienTai' => $request->TrangThai,
                'ThoiGianCapNhat' => now()
            ]);
        }

        return response()->json([
            'message' => 'Cập nhật thành công',
            'tiendo' => $tiendo
        ]);
    }

    public function store(Request $request)
    {
        // 1. Kiểm tra dữ liệu đầu vào
        $validated = $request->validate([
            'maDeTai'     => 'required|exists:detai,MaSo',
            'tieuDe'      => 'required|string|max:255',
            'thoiGian'    => 'required|date',
            'phanTram'    => 'required|numeric|min:0|max:100',
            'noiDung'     => 'nullable|string',
            'ketQua'      => 'nullable|string',
            'khoKhan'     => 'nullable|string',
            'fileBaoCao'  => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,zip|max:10240',
        ]);
        
        // 2. Kiểm tra quyền
        $giangVien = Giangvien::where('HoTen', session('HoTen'))->first();

        if (!$giangVien) {
            return back()->with('error', 'Tài khoản chưa liên kết giảng viên.');
        }

        $deTai = Detai::findOrFail($request->maDeTai);

        if ($deTai->ChuNhiem !== $giangVien->HoTen && !str_contains($deTai->ThanhVien ?? '', $giangVien->HoTen)) {
            return back()->with('error', 'Bạn không có quyền cập nhật đề tài này.');
        }

        // 3. Xử lý lưu file (nếu có)
        $filePath = null;
        if ($request->hasFile('fileBaoCao')) {
            $file = $request->file('fileBaoCao');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('tien_do_files', $fileName, 'public');
        }

        // 4. PHÂN LOẠI HÀNH ĐỘNG: Lưu nháp hay Gửi báo cáo?
        $isDraft = $request->has('action') && $request->action === 'luu_nhap';

        // Tạo MaTienDo mới
        $maxMa = Tiendodetai::max('MaTienDo') ?? 0;
        $maMoi = $maxMa + 1;

        // Đánh dấu dòng trạng thái để dễ nhận biết trong DB
        $tienDoHienTaiText = $isDraft 
            ? "Bản nháp - Cập nhật {$request->phanTram}%" 
            : "Đã báo cáo - Cập nhật {$request->phanTram}%";

        // 5. LUÔN LƯU VÀO BẢNG LỊCH SỬ (Tiendodetai)
        Tiendodetai::create([
            'MaTienDo'       => $maMoi,
            'MaDeTai'        => $request->maDeTai,
            'TenDeTai'       => $deTai->TenDeTai,
            'TrangThai'      => $deTai->TrangThai,
            'ThoiGianCapNhat'=> $request->thoiGian,
            'FileBaoCao'     => $filePath,
            'NoiDungBaoCao'  => $request->noiDung,
            'KetQua'         => $request->ketQua,
            'KhoKhan'        => $request->khoKhan,
            'TienDoHienTai'  => $tienDoHienTaiText,
            'PhanTramTienDo' => $request->phanTram,
        ]);

        // 6. CHỈ CẬP NHẬT BẢNG ĐỀ TÀI CHÍNH KHI "GỬI BÁO CÁO"
        if (!$isDraft) {
            $deTai->update([
                'PhanTramTienDo' => $request->phanTram,
                // Tự động chuyển thành 'Hoàn thành' nếu % >= 100
                'TrangThai'      => $request->phanTram >= 100 ? 'Hoàn thành' : $deTai->TrangThai, 
            ]);
        }

        // 7. Trả về thông báo tương ứng
        $message = $isDraft 
                ? 'Đã lưu nháp tiến độ (chưa cập nhật % vào hệ thống)!' 
                : 'Cập nhật tiến độ thành công!';

        return redirect()->route('giangvien.deTaiCuaToi')->with('success', $message);
    }
}
