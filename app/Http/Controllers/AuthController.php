<?php

namespace App\Http\Controllers;

use App\Models\Canbokhoahoc;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Taikhoan;
use App\Models\Giangvien;
use App\Models\Nghiencuusinh;
class AuthController extends Controller
{
    public function showRegister()
    {
        $nextUserID = Taikhoan::max('UserID') + 1;
        $chucvu = Canbokhoahoc::select('ChucVu')->distinct()->pluck('ChucVu');
        return view('Admin.taikhoan.register', compact('nextUserID', 'chucvu'));
    }

public function register(Request $request)
{
    $request->validate([
        'VaiTro' => 'required|in:giangvien,nghiencuusinh',
        'MatKhau' => 'required|min:6',
        'HoTen' => 'required',
        'Khoa' => 'required',

        'Email' => 'nullable|email',
        'Sdt' => 'nullable',
        'ChucVu' => 'nullable',

        'Lop' => 'nullable',
        'NgaySinh' => 'nullable|date'
    ]);

    DB::beginTransaction();

    try {

        $userID = (Taikhoan::max('UserID') ?? 0) + 1;

        // tạo tài khoản
        Taikhoan::create([
            'UserID' => $userID,
            'MatKhau' => Hash::make($request->MatKhau),
            'VaiTro' => $request->VaiTro
        ]);

        if ($request->VaiTro === 'giangvien') {

            Giangvien::create([
                'MaGiangVien' => (Giangvien::max('MaGiangVien') ?? 0) + 1,
                'UserID' => $userID,
                'HoTen' => $request->HoTen,
                'ChucVu' => $request->ChucVu,
                'Khoa' => $request->Khoa,
                'Email' => $request->Email,
                'Sdt' => $request->Sdt
            ]);

        }

        if ($request->VaiTro === 'nghiencuusinh') {

            Nghiencuusinh::create([
                'MaSinhVien' => (Nghiencuusinh::max('MaSinhVien') ?? 0) + 1,
                'UserID' => $userID,
                'HoTen' => $request->HoTen,
                'Khoa' => $request->Khoa,
                'Lop' => $request->Lop,
                'NgaySinh' => $request->NgaySinh
            ]);

        }

        DB::commit();

        return redirect()->route('admin.trangChu')
            ->with('success', 'Tạo tài khoản thành công');

    } catch (\Exception $e) {

        DB::rollBack();

        return back()
            ->with('error', 'Có lỗi xảy ra: ' . $e->getMessage())
            ->withInput();
    }
}
    public function login(Request $request)
    {

        $request->validate([
            'UserID' => 'required',
            'MatKhau' => 'required'
        ]);

        $user = Taikhoan::where('UserID', $request->UserID)->first();

        if (!$user || !Hash::check($request->MatKhau, $user->MatKhau)) {
            return back()->withErrors([
                'MatKhau' => 'Sai tài khoản hoặc mật khẩu'
            ])->withInput();
        }

        session([
            'UserID' => $user->UserID,
            'VaiTro' => $user->VaiTro
        ]);

        if ($user->VaiTro == 'nghiencuusinh') {
            $sv = Nghiencuusinh::where('UserID', $user->UserID)->first();
            session(['HoTen' => $sv->HoTen]);
            return redirect()->route('sinhVien.trangChu');
        }

        if ($user->VaiTro == 'giangvien') {
            $gv = Giangvien::where('UserID', $user->UserID)->first();
            session(['HoTen' => $gv->HoTen]);
            return redirect('/giangvien/trang-chu');
        }

        if ($user->VaiTro == 'admin') {
            session(['HoTen' => 'Admin']);
            return redirect()->route('admin.trangChu');
        }

        return redirect('/');
    }
    public function showLogin()
    {
        return view('Admin.auth.login');
    }

    public function logout()
    {

        session()->flush();

        return redirect('/login');

    }

}
