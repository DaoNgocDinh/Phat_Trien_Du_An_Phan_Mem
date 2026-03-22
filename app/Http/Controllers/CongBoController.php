<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongBo;
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
                'TieuDe' => $request->TieuDe,
                'LoaiCongBo' => $request->LoaiCongBo,
                'NamCongBo' => $request->NamCongBo,
                'TapChi' => $request->TapChi,
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
        $congbo = Congbo::findOrFail($id);

        $congbo->TrangThai = $request->TrangThai;
        $congbo->save();

        return redirect()->route('admin.congbo.pheduyet.danhsach')
            ->with('success', 'Cập nhật trạng thái thành công');
    }

    public function baocao(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

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
        $byType = CongBo::select(
            'LoaiCongBo',
            DB::raw('count(*) as total')
        )
            ->groupBy('LoaiCongBo')
            ->get();

        $total = $query->count();

        return view('Admin.thongke.dashboard', compact('byYear', 'byType', 'total'));
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
}