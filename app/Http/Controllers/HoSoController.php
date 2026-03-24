<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GiangVien;
use App\Models\Nghiencuusinh;

class HoSoController extends Controller
{

    // Hiển thị hồ sơ
    public function edit()
    {
        $userID = session('UserID');
        $vaiTro = session('VaiTro');

        if (!$userID) {
            return redirect('/login');
        }

        if ($vaiTro == 'giangvien') {
            $hoso = GiangVien::where('UserID', $userID)->first();
        }

        if ($vaiTro == 'nghiencuusinh') {
            $hoso = Nghiencuusinh::where('UserID', $userID)->first();
        }

        return view('Giangvien.hosocanhan.edit', compact('hoso'));
    }


    // Cập nhật hồ sơ
    public function update(Request $request)
    {

        $request->validate([
            'HoTen' => 'required|string|max:255',
            'NgaySinh' => 'required|date|before_or_equal:today',
            'SoDienThoai' => 'required|regex:/^[0-9]{10}$/',
            'Email' => 'required|email',
        ], [
            'HoTen.required' => 'Vui lòng nhập họ tên',
            'NgaySinh.required' => 'Vui lòng chọn ngày sinh',
            'NgaySinh.before_or_equal' => 'Ngày sinh không hợp lệ',
            'SoDienThoai.required' => 'Vui lòng nhập số điện thoại',
            'SoDienThoai.regex' => 'Số điện thoại phải 10 chữ số',
            'Email.required' => 'Vui lòng nhập email',
            'Email.email' => 'Email không hợp lệ',
        ]);

        $userID = session('UserID');
        $vaiTro = session('VaiTro');

        if (!$userID) {
            return redirect('/login');
        }

        if ($vaiTro == 'giangvien') {

            $gv = GiangVien::where('UserID', $userID)->first();

            $gv->HoTen = $request->HoTen;
            $gv->NgaySinh = $request->NgaySinh;
            $gv->Email = $request->Email;
            $gv->Sdt = $request->SoDienThoai;

            $gv->NgaySinh = $request->NgaySinh;

            if ($request->hasFile('CV')) {
                $file = $request->file('CV');
                $path = $file->store('cv', 'public');
                $gv->CV = $path;
            }

            $gv->save();
        }

        if ($vaiTro == 'nghiencuusinh') {

            $sv = Nghiencuusinh::where('UserID', $userID)->first();

            $sv->HoTen = $request->HoTen;
            $sv->Khoa = $request->Khoa;
            $sv->NgaySinh = $request->NgaySinh;

            $sv->save();
        }

        return back()->with('success', 'Cập nhật thành công');
    }
}
