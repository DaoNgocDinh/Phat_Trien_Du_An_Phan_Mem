<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongBo;

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

    public function show($id)
    {
        $congbo = CongBo::findOrFail($id);

        return view('Admin.CongBo.show', compact('congbo'));

    }
}