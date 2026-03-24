<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detai;

class DeTaiController extends Controller
{
    // danh sách đề tài
    public function index()
    {
        $danhmuc = Detai::select('LoaiDeTai')
            ->distinct()
            ->paginate(10);

        return view('Admin.quanlydanhmuc.index', compact('danhmuc'));
    }

    // form thêm
    public function create()
    {
        return view('Admin.detai.create');
    }

    // lưu đề tài
    public function store(Request $request)
    {
        $request->validate([
            'TenDeTai' => 'required',
            'ThoiGianBatDau' => 'required',
            'ThoiGianKetThuc' => 'required',
            'KinhPhi' => 'required|numeric|min:0',
            'NoiDungChinh' => 'required',
            'MucTieu' => 'required',
            'FileSanPham' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('FileSanPham')) {
            $file = $request->file('FileSanPham');

            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads/pdf'), $fileName);
        }

        $MaSo = Detai::max('MaSo') + 1;
        $ChuNhiem = session('HoTen');

        Detai::create([
            'MaSo' => $MaSo,
            'TenDeTai' => $request->TenDeTai,
            'ChuNhiem' => $ChuNhiem,
            'DonVi' => $request->DonVi,
            'CapDeTai' => $request->CapDeTai,
            'LoaiDeTai' => $request->LoaiDeTai,
            'ThoiGianBatDau' => $request->ThoiGianBatDau,
            'ThoiGianKetThuc' => $request->ThoiGianKetThuc,
            'TrangThai' => 'Chờ Duyệt',
            'MucTieu' => $request->MucTieu,
            'NoiDungChinh' => $request->NoiDungChinh,
            'Thanhvien' => '',
            'KetQua' => '',
            'FileSanPham' => $fileName ?? null,
            'KinhPhi' => $request->KinhPhi,
        ]);

        return redirect()->route('giangvien.deTai')->with('success', 'Thêm thành công');
    }

    // form sửa
    public function edit($MaSo)
    {
        $detai = Detai::findOrFail($MaSo);
        return view('Admin.detai.edit', compact('detai'));
    }

    // update
    public function update(Request $request, $MaSo)
    {
        $detai = Detai::findOrFail($MaSo);

        $detai->update($request->all());

        return redirect()->route('admin.detai.index')
            ->with('success', 'Cập nhật thành công');
    }

    // xóa
    public function destroy($MaSo)
    {
        Detai::destroy($MaSo);

        return redirect()->route('admin.detai.index')
            ->with('success', 'Xóa thành công');
    }

    public function sugget()
    {
        return view('Giangvien.detai.deXuatThemtnKH');
    }
    public function index_giangvien()
    {
        return view('Giangvien.detai.index');
    }
}
