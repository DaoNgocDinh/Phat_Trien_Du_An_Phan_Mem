<?php

namespace App\Http\Controllers;

use App\Models\CongBo;
use Illuminate\Http\Request;

class CongBoController extends Controller
{
    public function index(Request $request)
    {
        $query = CongBo::query();

        if ($request->string('filter')->lower()->toString() === 'pending') {
            $query->where('TrangThai', 'Chờ duyệt');
        }

        $congbos = $query->orderByDesc('MaCongBo')->paginate(10)->withQueryString();

        return view('Admin.CongBo.index', compact('congbos'));
    }

    public function edit($id)
    {

        $congbo = CongBo::findOrFail($id);

        return view('Admin.CongBo.edit', compact('congbo'));

    }

    public function update(Request $request,$id)
{
    $congbo = CongBo::findOrFail($id);

    $data = $request->validate([
        'TenCongBo'=>'required',
        'TacGia'=>'required',
        'LoaiCongBo'=>'required',
        'NamXuatBan'=>'required|integer',
        'NoiCongBo'=>'nullable',
        'DOI'=>'nullable',
        'NoiDungTomTat'=>'nullable',
        'FilePDF'=>'nullable|file|mimes:pdf'
    ]);

    if($request->hasFile('FilePDF')){
        $path = $request->file('FilePDF')->store('congbo','public');
        $data['FilePDF']=$path;
    }

    $congbo->update($data);

    return redirect()->route('admin.congbo.index')
           ->with('success','Cập nhật thành công');
}

    public function destroy($id)
    {
        $congbo = CongBo::findOrFail($id);
        $congbo->delete();

        return redirect()->route('admin.congbo.index')
               ->with('success','Xóa thành công');
    }
}
