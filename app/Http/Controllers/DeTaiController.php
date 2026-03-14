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
            ->get();

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
        Detai::create($request->all());

        return redirect()->route('admin.detai.index')
            ->with('success', 'Thêm đề tài thành công');
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
}
