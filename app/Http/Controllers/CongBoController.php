<?php

namespace App\Http\Controllers;

use App\Models\Giangvien;
use App\Models\Khoa;
use App\Models\ChucVu;
use App\Models\CongBo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CongBoController extends Controller
{
    public function index()
    {
        $congbos = CongBo::paginate(10);

        return view('Admin.CongBo.index', compact('congbos'));
    }

    // thêm công bố
    public function store(Request $request)
    {
        try {

            CongBo::create([
                'TenCongBo' => $request->TieuDe,
                'LoaiCongBo' => $request->LoaiCongBo,
                'NamXuatBan' => $request->NamCongBo,
                'NoiCongBo' => $request->TapChi,
                'GiangVienID' => $request->GiangVienID,
                'KhoaID' => $request->KhoaID,
                'TrangThai' => 'ChoDuyet'
            ]);

            return redirect()->back()->with('success', 'Thêm công bố thành công');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Thêm công bố thất bại');

        }
    }


    // update
    public function update(Request $request, $id)
    {
        try {

            $data = CongBo::findOrFail($id);

            $data->update($request->all());

            return redirect()->route('admin.congbo.index')
                ->with('success', 'Cập nhật thành công');

        } catch (\Exception $e) {

            return redirect()->route('admin.congbo.index')
                ->with('error', 'Cập nhật thất bại');

        }
    }


    // delete
    public function destroy($id)
    {
        try {

            CongBo::destroy($id);

            return redirect()->back()->with('success', 'Xoá thành công');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Xoá thất bại');

        }
    }
    public function edit($id)
    {
        $congbo = CongBo::findOrFail($id);

        return view('Admin.CongBo.edit', compact('congbo'));
    }

    public function chiTietCongBo($id)
    {
        $congbo = CongBo::findOrFail($id);

        return view('Admin.CongBo.showpublication', compact('congbo'));

    }

    public function danhSachCongBo(Request $request)
    {
        $congbos = CongBo::where('TrangThai', 'Chờ Duyệt')->orderBy('created_at', 'desc')
            ->paginate(10);


        return view('Admin.CongBo.publication', compact('congbos'));
    }
    public function capNhatTrangThai(Request $request, $id)
    {
        $congbo = CongBo::findOrFail($id);

        $congbo->TrangThai = $request->TrangThai;
        $congbo->save();

        return redirect()->route('admin.congbo.pheduyet.danhsach')
            ->with('success', 'Cập nhật trạng thái thành công');
    }

    public function baocao(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $loai = $request->loai;
        $khoa = $request->khoa;
        $giangvien = $request->giangvien;

        $baseQuery = CongBo::query();

        // lọc theo năm
        if ($from && $to) {
            $baseQuery->whereBetween('NamXuatBan', [$from, $to]);
        }

        // lọc theo khoa
        if ($khoa && $khoa !== '') {
            $baseQuery->where('KhoaID', $khoa);
        }

        // lọc theo giảng viên
        if ($giangvien && $giangvien !== '') {
            $baseQuery->where('GiangVienID', $giangvien);
        }

        // lọc theo loại công bố
        if ($loai && $loai !== '') {
            $baseQuery->where('LoaiCongBo', $loai);
        }

        // thống kê theo năm
        $byYear = (clone $baseQuery)->select(
            'NamXuatBan',
            DB::raw('count(*) as total')
        )
            ->groupBy('NamXuatBan')
            ->orderBy('NamXuatBan')
            ->get();

        // thống kê theo loại
        $byType = (clone $baseQuery)->select(
            'LoaiCongBo',
            DB::raw('count(*) as total')
        )
            ->groupBy('LoaiCongBo')
            ->orderBy('LoaiCongBo')
            ->get();

        // thống kê theo khoa + loại
        $byKhoaLoai = (clone $baseQuery)
            ->leftJoin('khoa', 'congbo.KhoaID', '=', 'khoa.MaKhoa')
            ->select(
                DB::raw('COALESCE(khoa.TenKhoa, "Chưa xác định") as TenKhoa'),
                'LoaiCongBo',
                DB::raw('count(*) as total')
            )
            ->groupBy('khoa.TenKhoa', 'LoaiCongBo')
            ->orderBy('khoa.TenKhoa')
            ->orderBy('LoaiCongBo')
            ->get();

        $total = $baseQuery->count();

        // kiểm tra trang Tạo báo cáo
        $isCreatePage = $request->routeIs('admin.congbo.baocao.create');
        // chỉ hiển thị chart/table khi đã nhấn Xem
        $showReport = ($from && $to) || ($request->filled('loai') || $request->filled('khoa') || $request->filled('giangvien'));

        // lấy danh sách giảng viên cho select
        $giangviens = Giangvien::select('MaGiangVien', 'HoTen')->get();

        // lấy danh sách khoa cho select
        $khoas = Khoa::select('MaKhoa', 'TenKhoa')->get();

        // lấy danh sách loại công bố cho select
        $loaiOptions = CongBo::distinct('LoaiCongBo')->pluck('LoaiCongBo')->filter()->values();

        return view('Admin.thongke.dashboard', compact('byYear', 'byType', 'byKhoaLoai', 'total', 'from', 'to', 'loai', 'khoa', 'giangvien', 'giangviens', 'khoas', 'loaiOptions', 'isCreatePage', 'showReport'));
    }
    public function taobaocao(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $loai = $request->loai;
        $khoa = $request->khoa;
        $giangvien = $request->giangvien;

        $baseQuery = CongBo::query();

        // lọc theo năm
        if ($from && $to) {
            $baseQuery->whereBetween('NamXuatBan', [$from, $to]);
        }

        // lọc theo khoa
        if ($khoa && $khoa !== '') {
            $baseQuery->where('KhoaID', $khoa);
        }

        // lọc theo giảng viên
        if ($giangvien && $giangvien !== '') {
            $baseQuery->where('GiangVienID', $giangvien);
        }

        // lọc theo loại công bố
        if ($loai && $loai !== '') {
            $baseQuery->where('LoaiCongBo', $loai);
        }

        // thống kê theo năm
        $byYear = (clone $baseQuery)->select(
            'NamXuatBan',
            DB::raw('count(*) as total')
        )
            ->groupBy('NamXuatBan')
            ->orderBy('NamXuatBan')
            ->get();

        // thống kê theo loại
        $byType = (clone $baseQuery)->select(
            'LoaiCongBo',
            DB::raw('count(*) as total')
        )
            ->groupBy('LoaiCongBo')
            ->orderBy('LoaiCongBo')
            ->get();

        // thống kê theo khoa + loại
        $byKhoaLoai = (clone $baseQuery)
            ->leftJoin('khoa', 'congbo.KhoaID', '=', 'khoa.MaKhoa')
            ->select(
                DB::raw('COALESCE(khoa.TenKhoa, "Chưa xác định") as TenKhoa'),
                'LoaiCongBo',
                DB::raw('count(*) as total')
            )
            ->groupBy('khoa.TenKhoa', 'LoaiCongBo')
            ->orderBy('khoa.TenKhoa')
            ->orderBy('LoaiCongBo')
            ->get();

        $total = $baseQuery->count();

        // kiểm tra trang Tạo báo cáo
        $isCreatePage = $request->routeIs('admin.congbo.baocao.create');
        // chỉ hiển thị chart/table khi đã nhấn Xem
        $showReport = ($from && $to) || ($request->filled('loai') || $request->filled('khoa') || $request->filled('giangvien'));

        // lấy danh sách giảng viên cho select
        $giangviens = Giangvien::select('MaGiangVien', 'HoTen')->get();

        // lấy danh sách khoa cho select
        $khoas = Khoa::select('MaKhoa', 'TenKhoa')->get();

        // lấy danh sách loại công bố cho select
        $loaiOptions = CongBo::distinct('LoaiCongBo')->pluck('LoaiCongBo')->filter()->values();

        return view('Admin.thongke.create', compact('byYear', 'byType', 'byKhoaLoai', 'total', 'from', 'to', 'loai', 'khoa', 'giangvien', 'giangviens', 'khoas', 'loaiOptions', 'isCreatePage', 'showReport'));
    }

    public function suggest(Request $request)
    {

        $request->validate([
            'TenCongBo' => 'required|string|max:255',
            'LoaiCongBo' => 'required|string|max:255',
            'TacGia' => 'required|string|max:255',
            'NoiCongBo' => 'required|string|max:255',
            'NamXuatBan' => 'required',
            'FilePDF' => 'required|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('FilePDF')) {
            $file = $request->file('FilePDF');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/pdf'), $fileName);
        }

        $MaCongBo = CongBo::max('MaCongBo') + 1;

        $namXuatBan = $request->input('NamXuatBan');
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $namXuatBan)) {
            $namXuatBan = date('Y', strtotime($namXuatBan));
        }

        CongBo::create([
            'MaCongBo' => $MaCongBo,
            'TenCongBo' => $request->TenCongBo,
            'TacGia' => $request->TacGia,
            'NamXuatBan' => (int) $namXuatBan,
            'NoiCongBo' => $request->NoiCongBo,
            'LoaiCongBo' => $request->LoaiCongBo,
            'DOI' => 'Có',
            'FilePDF' => $fileName ?? null,
            'TrangThai' => 'ChoDuyet',
            'NoiDungTomTat' => $request->NoiDungTomTat,
        ]);

        return redirect()->route('giangvien.congBo')->with('success', 'Thêm thành công');
    }

    public function showSuggest()
    {
        return view('giangvien.congbo.suggest');
    }

    public function congBoCuaToi()
    {
        // Lấy họ tên giảng viên đang đăng nhập
        $hoTen = session('HoTen');

        if (!$hoTen) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập.');
        }

        // Lấy danh sách công bố có tên của giảng viên này (Tìm tương đối trong cột TacGia)
        $congBoCuaToi = Congbo::where('TacGia', 'LIKE', '%' . $hoTen . '%')
            // ->orderBy('NamXuatBan', 'desc') // Mở comment dòng này nếu bạn có cột Năm xuất bản và muốn sắp xếp mới nhất lên đầu
            ->paginate(10);

        return view('giangvien.congbo.congBoCuaToi', compact('congBoCuaToi'));
    }
    public function export(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $format = $request->format ?? 'pdf';

        $query = CongBo::query();

        // lọc theo năm
        if ($from && $to) {
            $query->whereBetween('NamXuatBan', [$from, $to]);
        }

        // thống kê theo năm
        $byYear = $query->select(
            'NamXuatBan',
            DB::raw('count(*) as total')
        )
            ->groupBy('NamXuatBan')
            ->orderBy('NamXuatBan')
            ->get();

        // thống kê theo loại
        $byType = $query->select(
            'LoaiCongBo',
            DB::raw('count(*) as total')
        )
            ->groupBy('LoaiCongBo')
            ->get();

        $total = $query->count();

        if ($format === 'excel') {
            return $this->exportExcel($byYear, $byType, $total, $from, $to);
        } else {
            return $this->exportPDF($byYear, $byType, $total, $from, $to);
        }
    }

    private function exportPDF($byYear, $byType, $total, $from, $to)
    {
        $pdf = Pdf::loadView('Admin.thongke.report_pdf', compact('byYear', 'byType', 'total', 'from', 'to'));

        $filename = 'bao-cao-thong-ke-' . date('Y-m-d') . '.pdf';

        return $pdf->download($filename);
    }

    private function exportExcel($byYear, $byType, $total, $from, $to)
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'BÁO CÁO THỐNG KÊ CÔNG BỐ KHOA HỌC');
        $sheet->mergeCells('A1:D1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);

        if ($from && $to) {
            $sheet->setCellValue('A2', "Thời gian: Từ năm {$from} đến năm {$to}");
        } else {
            $sheet->setCellValue('A2', 'Thời gian: Tất cả');
        }
        $sheet->mergeCells('A2:D2');

        $sheet->setCellValue('A3', 'Tổng số công bố: ' . $total);
        $sheet->mergeCells('A3:D3');

        // Thống kê theo năm
        $sheet->setCellValue('A5', 'Thống kê theo năm');
        $sheet->getStyle('A5')->getFont()->setBold(true);

        $sheet->setCellValue('A6', 'Năm');
        $sheet->setCellValue('B6', 'Số lượng');
        $sheet->getStyle('A6:B6')->getFont()->setBold(true);

        $row = 7;
        foreach ($byYear as $year) {
            $sheet->setCellValue('A' . $row, $year->NamXuatBan);
            $sheet->setCellValue('B' . $row, $year->total);
            $row++;
        }

        // Thống kê theo loại
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Thống kê theo loại công bố');
        $sheet->getStyle('A' . $row)->getFont()->setBold(true);

        $row++;
        $sheet->setCellValue('A' . $row, 'Loại công bố');
        $sheet->setCellValue('B' . $row, 'Số lượng');
        $sheet->getStyle('A' . $row . ':B' . $row)->getFont()->setBold(true);

        $row++;
        foreach ($byType as $type) {
            $sheet->setCellValue('A' . $row, $type->LoaiCongBo);
            $sheet->setCellValue('B' . $row, $type->total);
            $row++;
        }

        // Auto size columns
        foreach (range('A', 'D') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'bao-cao-thong-ke-' . date('Y-m-d') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
    public function hienthitaobaocao()
    {
        return view('Admin.thongke.create');
    }
}