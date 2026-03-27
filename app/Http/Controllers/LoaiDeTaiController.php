<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiDeTai;
use App\Models\Detai;
use Illuminate\Support\Facades\DB;
use App\Models\DonVi;
use Illuminate\Support\Facades\Validator;

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
        try {

            if ($request->type == 'donvi') {

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

            return back()->with('success', 'Thêm danh mục thành công!');
        } catch (\Illuminate\Validation\ValidationException $e) {

            return back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('form_type', 'create'); // 🔥 FIX BUG Ở ĐÂY
        }
    }

    // SỬA
    public function update(Request $request, $id)
    {
        if ($request->type == 'donvi') {

            $validator = Validator::make($request->all(), [
                'ten_don_vi' => 'required|string|max:255|unique:don_vis,ten_don_vi,' . $id . ',id'
            ], [
                'ten_don_vi.required' => 'Không được để trống!',
                'ten_don_vi.unique' => 'Tên đơn vị đã tồn tại!'
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('form_type', 'edit'); // 🔥 QUAN TRỌNG
            }

            \App\Models\DonVi::findOrFail($id)->update([
                'ten_don_vi' => $request->ten_don_vi
            ]);
        } else {

            $validator = Validator::make($request->all(), [
                'ten_loai' => 'required|string|max:255|unique:loai_de_tais,ten_loai,' . $id . ',id'
            ], [
                'ten_loai.required' => 'Không được để trống!',
                'ten_loai.unique' => 'Tên loại đã tồn tại!'
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('form_type', 'edit'); // 🔥
            }

            \App\Models\LoaiDeTai::findOrFail($id)->update([
                'ten_loai' => $request->ten_loai
            ]);
        }

        return back()->with('success', 'Cập nhật thành công!');
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
