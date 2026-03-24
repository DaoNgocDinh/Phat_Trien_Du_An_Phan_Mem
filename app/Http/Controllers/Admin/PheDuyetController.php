<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detai;
use Illuminate\Http\Request;
use App\Models\LoaiDeTai;

class PheDuyetController extends Controller
{
    // Trang danh sách
    public function index()
    {
        // Lấy tất cả loại đề tài
        $detais = Detai::where('TrangThai', 'Chờ Duyệt')->paginate(10);

        return view('Admin.pheduyetdexuat.index', compact('detais'));
    }

    // Lấy chi tiết
    public function show($id)
    {
        $dt = Detai::findOrFail($id);
        return response()->json($dt);
    }

    // Phê duyệt
    public function approve($id)
    {
        $dt = Detai::findOrFail($id);

        if ($dt->TrangThai != 'Chờ Duyệt') {
            return response()->json(['success' => false]);
        }

        $dt->TrangThai = 'Đã Duyệt';
        $dt->save();

        return response()->json(['success' => true]);
    }

    // Từ chối
    public function reject(Request $request, $id)
    {
        $dt = Detai::findOrFail($id);

        if ($dt->TrangThai != 'Chờ Duyệt') {
            return response()->json(['success' => false]);
        }

        $dt->TrangThai = 'Từ Chối';
        $dt->LyDoTuChoi = $request->LyDoTuChoi;
        $dt->save();

        return response()->json(['success' => true]);
    }
}