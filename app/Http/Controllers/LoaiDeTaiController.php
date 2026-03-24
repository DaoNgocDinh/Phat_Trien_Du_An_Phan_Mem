<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiDeTai;
use App\Models\Detai;
use Illuminate\Support\Facades\DB;

class LoaiDeTaiController extends Controller
{
    // HIỂN THỊ
    public function index()
    {
        $danhmuc = LoaiDeTai::paginate(10);

        return view('Admin.quanlydanhmuc.index', compact('danhmuc'));
    }

    // THÊM
    public function store(Request $request)
    {
        $request->validate([
            'ten_loai' => 'required|string|max:255|unique:loai_de_tais,ten_loai'
        ], [
            'ten_loai.required' => 'Không được để trống tên loại!',
            'ten_loai.unique' => 'Tên loại đã tồn tại!',
            'ten_loai.max' => 'Tên loại tối đa 255 ký tự!'
        ]);
        LoaiDeTai::create([
            'ten_loai' => $request->ten_loai
        ]);

        return back()->with('success', 'Thêm danh mục thành công!');
    }

    // SỬA
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten_loai' => 'required|string|max:255|unique:loai_de_tais,ten_loai,' . $id
        ], [
            'ten_loai.required' => 'Không được để trống!',
            'ten_loai.unique' => 'Tên loại đã tồn tại!'
        ]);

        $dm = LoaiDeTai::findOrFail($id);

        $dm->update([
            'ten_loai' => $request->ten_loai
        ]);

        return back()->with('success', 'Cập nhật danh mục thành công!');
    }

    // XÓA
    public function destroy($id)
    {
        $dm = LoaiDeTai::findOrFail($id);

        // nếu có đề tài dùng thì không cho xóa
        if ($dm->detais()->count() > 0) {
            return back()->with('error', 'Không thể xóa vì đang được sử dụng');
        }

        $dm->delete();

        return back()->with('success', 'Xóa thành công');
    }
}
