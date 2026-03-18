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


}