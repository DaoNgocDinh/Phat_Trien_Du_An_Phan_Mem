<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use App\Models\Khoa;
use App\Models\Giangvien;
use App\Models\Nghiencuusinh;
use App\Models\Taikhoan;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function showRegister()
    {
        $nextUserID = Taikhoan::max('UserID') + 1;

        $khoas = Khoa::select('MaKhoa', 'TenKhoa')->get();
        $chucvus = ChucVu::select('MaChucVu', 'TenChucVu')->get();

        $chucvuByKhoa = Giangvien::whereNotNull('giangvien.MaKhoa')
            ->whereNotNull('giangvien.MaChucVu')
            ->join('khoa', 'giangvien.MaKhoa', '=', 'khoa.MaKhoa')
            ->join('chucvu', 'giangvien.MaChucVu', '=', 'chucvu.MaChucVu')
            ->select('khoa.MaKhoa', 'khoa.TenKhoa', 'chucvu.MaChucVu', 'chucvu.TenChucVu')
            ->get()
            ->groupBy('MaKhoa')
            ->map(function ($items) {
                return $items->map(function ($item) {
                    return ['MaChucVu' => $item->MaChucVu, 'TenChucVu' => $item->TenChucVu];
                })->unique('MaChucVu')->values();
            });

        return view('Admin.taikhoan.register', compact('nextUserID', 'khoas', 'chucvus', 'chucvuByKhoa'));
    }

    public function register(Request $request)
    {
        if ($request->VaiTro !== 'giangvien') {
            $request->merge(['ChucVu' => null, 'Sdt' => null]);
        }

        if ($request->VaiTro !== 'nghiencuusinh') {
            $request->merge(['Lop' => null]);
        }

        $request->validate([
            'VaiTro' => 'required|in:giangvien,nghiencuusinh',
            'MatKhau' => 'required|min:6',
            'HoTen' => 'required',
            'Khoa' => 'required|exists:khoa,MaKhoa',

            'Email' => 'required|email',
            'NgaySinh' => 'required|date',

            'ChucVu' => 'required_if:VaiTro,giangvien|nullable|exists:chucvu,MaChucVu',
            'Sdt' => 'required_if:VaiTro,giangvien|nullable|regex:/^[0-9]{9,11}$/',

            'Lop' => 'required_if:VaiTro,nghiencuusinh|nullable',

        ], [
            'VaiTro.required' => 'Vui lòng chọn vai trò',
            'VaiTro.in' => 'Vai trò không hợp lệ',

            'MatKhau.required' => 'Vui lòng nhập mật khẩu',
            'MatKhau.min' => 'Mật khẩu phải có ít nhất 6 ký tự',

            'HoTen.required' => 'Vui lòng nhập họ tên',

            'Khoa.required' => 'Vui lòng chọn khoa',
            'Khoa.exists' => 'Khoa không tồn tại',

            'Email.required' => 'Vui lòng nhập email',
            'Email.email' => 'Email không đúng định dạng',

            'NgaySinh.required' => 'Vui lòng chọn ngày sinh',
            'NgaySinh.date' => 'Ngày sinh không hợp lệ',

            'ChucVu.required_if' => 'Vui lòng chọn chức vụ',
            'ChucVu.exists' => 'Chức vụ không tồn tại',

            'Sdt.required_if' => 'Vui lòng nhập số điện thoại',
            'Sdt.regex' => 'Số điện thoại không hợp lệ',

            'Lop.required_if' => 'Vui lòng nhập lớp',
        ]);

        DB::beginTransaction();

        try {

            $userID = (Taikhoan::max('UserID') + 10000 ?? 0) + 1;

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
                    'MaKhoa' => $request->Khoa,
                    'MaChucVu' => $request->ChucVu,
                    'Email' => $request->Email,
                    'Sdt' => $request->Sdt,
                    'NgaySinh' => $request->NgaySinh
                ]);
            }

            if ($request->VaiTro === 'nghiencuusinh') {
                Nghiencuusinh::create([
                    'MaSinhVien' => (Nghiencuusinh::max('MaSinhVien') ?? 0) + 1,
                    'UserID' => $userID,
                    'HoTen' => $request->HoTen,
                    'MaKhoa' => $request->Khoa,
                    'Lop' => $request->Lop,
                    'Email' => $request->Email,
                    'NgaySinh' => $request->NgaySinh
                ]);
            }

            DB::commit();

            return redirect()->route('admin.users.index')
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
        ], [
            'UserID.required' => 'Vui lòng nhập tài khoản',
            'MatKhau.required' => 'Vui lòng nhập mật khẩu',
        ]);

        $user = Taikhoan::where('UserID', $request->UserID)->first();

        if (!$user || !Hash::check($request->MatKhau, $user->MatKhau)) {
            return back()->withErrors([
                'login' => 'Sai tài khoản hoặc mật khẩu'
            ])->withInput();
        }

        // SESSION
        session([
            'UserID' => $user->UserID,
            'VaiTro' => $user->VaiTro
        ]);

        // 👉 REMEMBER LOGIN
        if ($request->remember) {
            Cookie::queue('remember_user', $user->UserID, 60 * 24 * 7); // 7 ngày
        } else {
            Cookie::queue(Cookie::forget('remember_user'));
        }

        // ROLE
        if ($user->VaiTro == 'nghiencuusinh') {
            $sv = Nghiencuusinh::where('UserID', $user->UserID)->first();
            session(['HoTen' => $sv->HoTen]);
            return redirect()->route('giangvien.trangChu'); // bạn đang redirect sai role đó
        }

        if ($user->VaiTro == 'giangvien') {
            $gv = Giangvien::where('UserID', $user->UserID)->first();
            session(['HoTen' => $gv->HoTen]);
            return redirect()->route('giangvien.trangChu');
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

        Cookie::queue(Cookie::forget('remember_user'));

        return redirect()->route('sinhvien.trangChu');
    }

    public function showChangePassword()
    {
        return view('Admin.auth.change_password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed'
        ], [
            'old_password.required' => 'Vui lòng nhập mật khẩu cũ',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới',
            'new_password.min' => 'Mật khẩu phải ít nhất 6 ký tự',
            'new_password.confirmed' => 'Nhập lại mật khẩu không khớp'
        ]);

        $user = Taikhoan::where('UserID', session('UserID'))->first();

        if (!$user) {
            return back()->with('error', 'Không tìm thấy tài khoản');
        }

        if (!Hash::check($request->old_password, $user->MatKhau)) {
            return back()->with('error', 'Mật khẩu cũ không đúng');
        }

        $user->MatKhau = Hash::make($request->new_password);
        $user->save();

        session()->flush();

        return redirect()->route('login')
            ->with('success', 'Đổi mật khẩu thành công, vui lòng đăng nhập lại');
    }

    public function showForgotPassword()
    {
        return view('Admin.auth.forgot_password');
    }
    public function handleForgotPassword(Request $request)
    {
        $request->validate([
            'UserID' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ], [
            'UserID.required' => 'Vui lòng nhập mã tài khoản',

            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',

            'password.required' => 'Vui lòng nhập mật khẩu mới',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.confirmed' => 'Mật khẩu nhập lại không khớp',
        ]);

        $user = Taikhoan::where('UserID', $request->UserID)->first();

        if (!$user) {
            return back()->with('error', 'Tài khoản không tồn tại')->withInput();
        }

        $gv = Giangvien::where('UserID', $user->UserID)
            ->where('Email', $request->email)
            ->first();

        $ncs = Nghiencuusinh::where('UserID', $user->UserID)
            ->where('Email', $request->email)
            ->first();

        if (!$gv && !$ncs) {
            return back()->with('error', 'Email không khớp với tài khoản')->withInput();
        }

        $user->MatKhau = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Đổi mật khẩu thành công');
    }

}
