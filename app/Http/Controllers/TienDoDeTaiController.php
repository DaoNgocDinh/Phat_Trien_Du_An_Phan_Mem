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
            ->paginate(10);

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
        $detai = Detai::where('MaSo', $request->maDeTai)->first();
        if (!$detai) {
            return back()->withErrors(['maDeTai' => 'Không tìm thấy đề tài.']);
        }

        $request->validate([
            'maDeTai'  => 'required|exists:detai,MaSo',
            'tieuDe'   => 'required|string|max:255',
            'thoiGian' => 'required|date',
            'phanTram' => 'required|numeric|min:0|max:100',
            'noiDung'  => 'required|string', // Đổi từ nullable -> required (TC43)
            'ketQua'   => 'nullable|string',
            'khoKhan'  => 'nullable|string',
            'fileBaoCao'=> 'nullable|mimes:pdf,doc,docx|max:10240', // Chỉ lấy pdf, doc, docx (TC44)
        ], [
            'noiDung.required' => 'Vui lòng nhập nội dung báo cáo', // TC43
            'fileBaoCao.mimes' => 'Chỉ chấp nhận file PDF/Word', // TC44
            'fileBaoCao.max'   => 'Dung lượng file không được vượt quá 10MB.',
        ]);

        // Xử lý Upload File
        $fileName = null;
        if ($request->hasFile('fileBaoCao')) {
            $file = $request->file('fileBaoCao');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/baocao'), $fileName);
        }

        // Tạo ID và Lưu tiến độ
        $maxId = \App\Models\Tiendodetai::max('MaTienDo');
        
        \App\Models\Tiendodetai::create([
            'MaTienDo'        => $maxId ? $maxId + 1 : 1,
            'MaDeTai'         => $request->maDeTai,
            'TenDeTai'        => $detai->TenDeTai,
            'TrangThai'       => 'Đã nộp',
            'ThoiGianCapNhat' => $request->thoiGian,
            'TienDoHienTai'   => $request->tieuDe,
            'PhanTramTienDo'  => $request->phanTram,
            'NoiDungBaoCao'   => $request->noiDung,
            'KetQua'          => $request->ketQua,
            'KhoKhan'         => $request->khoKhan,
            'FileBaoCao'      => $fileName,
        ]);

        return back()->with('success', 'Đã gửi báo cáo tiến độ thành công!');
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

    public function downloadBaoCao($file)
    {
        // 1. Trường hợp file nằm trong Storage (Ví dụ: tien_do_files/abc.pdf)
        if (str_starts_with($file, 'tien_do_files/')) {
            $filePath = storage_path('app/public/' . $file);
        } 
        // 2. Trường hợp file nằm trong Public (Ví dụ: 123456_abc.pdf)
        else {
            $filePath = public_path('uploads/baocao/' . $file);
        }

        // Kiểm tra xem file có thực sự tồn tại trong thư mục hay không
        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        // Nếu file bị mất hoặc xóa
        return back()->withErrors(['file' => 'File báo cáo không còn tồn tại trên máy chủ!']);
    }
}
