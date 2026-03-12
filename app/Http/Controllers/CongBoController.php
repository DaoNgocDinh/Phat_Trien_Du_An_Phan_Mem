<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\CongBo;
class CongBoController extends Controller
{
     public function index()
{
    $congbo = CongBo::paginate(10);

    return view('khoahoc.khoahoc', compact('congbo'));
}


    // lưu công bố
    public function store(Request $request)
    {

        CongBo::create([
            'TieuDe'=>$request->TieuDe,
            'LoaiCongBo'=>$request->LoaiCongBo,
            'NamCongBo'=>$request->NamCongBo,
            'TapChi'=>$request->TapChi,
            'GiangVienID'=>$request->GiangVienID,
            'KhoaID'=>$request->KhoaID,
            'TrangThai'=>'ChoDuyet'
        ]);

        return redirect()->back();
    }


    // update
    public function update(Request $request,$id)
    {

        $data = CongBo::findOrFail($id);

        $data->update($request->all());

        return redirect()->back();
    }


    // delete
    public function destroy($id)
    {

        CongBo::destroy($id);

        return redirect()->back();
    }
}
