<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detai;
use App\Models\Tiendodetai;
use Illuminate\Support\Facades\DB;

class TienDoDeTaiController extends Controller
{
    //// Danh sách đề tài
    public function index()
    {
        $detai = DeTai::all();

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
        $tiendo = Tiendodetai::create([
            'MaDeTai' => $request->MaSo,
            'TrangThai' => $request->TrangThai,
            'ThoiGianCapNhat' => now()
        ]);

        return response()->json([
            'message' => 'Cập nhật thành công',
            'tiendo' => $tiendo
        ]);
    }
}
