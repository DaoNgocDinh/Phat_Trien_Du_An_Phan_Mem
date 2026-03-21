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
        // tìm bản ghi tiến độ của đề tài
        $tiendo = Tiendodetai::where('MaDeTai', $request->MaDeTai)->first();

        if ($tiendo) {
            // ✅ đã có → update
            $tiendo->update([
                'TienDoHienTai' => $request->TrangThai,
                'ThoiGianCapNhat' => now()
            ]);
        } else {
            // ❗ chưa có → tạo mới (lần đầu)
            $maxId = Tiendodetai::max('MaTienDo');
            $newId = $maxId ? $maxId + 1 : 1;

            $tiendo = Tiendodetai::create([
                'MaTienDo' => $newId,
                'MaDeTai' => $request->MaDeTai,
                'TienDoHienTai' => $request->TrangThai,
                'ThoiGianCapNhat' => now()
            ]);
        }

        return response()->json([
            'message' => 'Cập nhật thành công',
            'tiendo' => $tiendo
        ]);
    }
}
