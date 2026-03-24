<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiDeTai;
use App\Models\Detai;
use Illuminate\Support\Facades\DB;
use App\Models\DonVi;

class LoaiDeTaiController extends Controller
{
    // HIỂN THỊ
    public function index(Request $request)
    {
        $type = $request->type ?? 'loai';
        if ($type == 'loai') {
            $danhmuc = LoaiDeTai::paginate(10);
        } else {
            $danhmuc = DonVi::paginate(10);
        }

        return view('Admin.quanlydanhmuc.index', compact('danhmuc', 'type'));
    }

    // THÊM
    public function store(Request $request)
    {
        if ($request->type == 'donvi') {

            // ✅ validate riêng cho đơn vị
            $request->validate([
                'ten_don_vi' => 'required|string|max:255|unique:don_vis,ten_don_vi'
            ], [
                'ten_don_vi.required' => 'Không được để trống tên đơn vị!',
                'ten_don_vi.unique' => 'Tên đơn vị đã tồn tại!',
                'ten_don_vi.max' => 'Tối đa 255 ký tự!'
            ]);

            \App\Models\DonVi::create([
                'ten_don_vi' => $request->ten_don_vi
            ]);
        } else {

            // ✅ GIỮ NGUYÊN của bạn
            $request->validate([
                'ten_loai' => 'required|string|max:255|unique:loai_de_tais,ten_loai'
            ], [
                'ten_loai.required' => 'Không được để trống tên loại!',
                'ten_loai.unique' => 'Tên loại đã tồn tại!',
                'ten_loai.max' => 'Tên loại tối đa 255 ký tự!'
            ]);

            \App\Models\LoaiDeTai::create([
                'ten_loai' => $request->ten_loai
            ]);
        }

        return back()->with('success', 'Thêm danh mụcthành công!');
    }

    // SỬA
    public function update(Request $request, $id)
    {
        if ($request->type == 'donvi') {

            $request->validate([
                'ten_don_vi' => 'required|string|max:255|unique:don_vis,ten_don_vi,' . $id
            ], [
                'ten_don_vi.required' => 'Không được để trống!',
                'ten_don_vi.unique' => 'Tên đơn vị đã tồn tại!'
            ]);

            $dm = \App\Models\DonVi::findOrFail($id);

            $dm->update([
                'ten_don_vi' => $request->ten_don_vi
            ]);
        } else {

            // ✅ giữ nguyên của bạn
            $request->validate([
                'ten_loai' => 'required|string|max:255|unique:loai_de_tais,ten_loai,' . $id
            ], [
                'ten_loai.required' => 'Không được để trống!',
                'ten_loai.unique' => 'Tên loại đã tồn tại!'
            ]);

            $dm = \App\Models\LoaiDeTai::findOrFail($id);

            $dm->update([
                'ten_loai' => $request->ten_loai
            ]);
        }

        return back()->with('success', 'Cập nhật danh mục thành công!');
    }

    // XÓA
    public function destroy(Request $request, $id)
    {
        if ($request->type == 'donvi') {

            $dm = \App\Models\DonVi::findOrFail($id);

            // nếu có đề tài dùng thì không cho xóa
            if ($dm->detais()->count() > 0) {
                // return back()->with('error', 'Không thể xóa vì đang được sử dụng');
                return back()->with(
                    'error',
                    'Không thể xóa! Đơn vị này đang có ' . $dm->detais()->count() . ' đề tài sử dụng.'
                );
            }

            $dm->delete();
        } else {

            // ✅ giữ nguyên của bạn
            $dm = \App\Models\LoaiDeTai::findOrFail($id);

            if ($dm->detais()->count() > 0) {
                // return back()->with(
                //     'error',
                //     'Không thể xóa! Đơn vị này đang có ' . $dm->detais()->count() . ' đề tài sử dụng.'
                // );
                return back()->with('error', 'Không thể xóa vì đang được sử dụng');
            }

            $dm->delete();
        }

        return back()->with('success', 'Xóa thành công');
    }
}
