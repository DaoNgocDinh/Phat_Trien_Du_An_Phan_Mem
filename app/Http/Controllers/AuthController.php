<?php

namespace App\Http\Controllers;

use App\Models\Canbokhoahoc;
use App\Models\ChucVu;
use App\Models\Khoa;
use App\Models\Giangvien;
use App\Models\Nghiencuusinh;
use App\Models\Taikhoan;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        // Ensure ChucVu is only set for giangvien
        if ($request->VaiTro !== 'giangvien') {
            $request->merge(['ChucVu' => null]);
        }

        $request->validate([
            'VaiTro' => 'required|in:giangvien,nghiencuusinh',
            'MatKhau' => 'required|min:6',
            'HoTen' => 'required',
            'Khoa' => 'required|exists:khoa,MaKhoa',

            'Email' => 'required|email',
            'Sdt' => 'nullable',
            'ChucVu' => 'nullable|required_if:VaiTro,giangvien|exists:chucvu,MaChucVu',

            'Lop' => 'nullable',
            'NgaySinh' => 'required_if:VaiTro,nghiencuusinh|date'
        ]);

        DB::beginTransaction();

        try {

            $userID = (Taikhoan::max('UserID') ?? 0) + 1;

            Taikhoan::create([
                'UserID' => $userID,
                'MatKhau' => Hash::make($request->MatKhau),
                'VaiTro' => $request->VaiTro
            ]);

            // Nên đã map sẵn từ id ở dropdown
            $maKhoa = $request->Khoa;
            $maChucVu = $request->ChucVu;
            if ($request->VaiTro === 'giangvien') {
                Giangvien::create([
                    'MaGiangVien' => (Giangvien::max('MaGiangVien') ?? 0) + 1,
                    'UserID' => $userID,
                    'HoTen' => $request->HoTen,
                    'MaKhoa' => $maKhoa,
                    'MaChucVu' => $maChucVu,
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
                    'MaKhoa' => $maKhoa,
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
            return redirect('/sinhvien/trang-chu');
        }
            // may chỉnh thêm login cho giảng viên ở đây
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

        return redirect('/login');

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
        ]);

        $user = Taikhoan::where('UserID', session('UserID'))->first();


        if (!Hash::check($request->old_password, $user->MatKhau)) {
            return back()->with('error', 'Mật khẩu cũ không đúng');
        }

        $user->MatKhau = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Đổi mật khẩu thành công');
    }

    public function showForgotPassword()
    {
        return view('auth.forgot_password');
    }
    public function handleForgotPassword(Request $request)
    {
        $request->validate([
            'UserID' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = Taikhoan::where('UserID', $request->UserID)->first();

        if (!$user) {
            return back()->with('error', 'Tài khoản không tồn tại');
        }

        $gv = Giangvien::where('UserID', $user->UserID)
            ->where('Email', $request->email)
            ->first();

        $ncs = Nghiencuusinh::where('UserID', $user->UserID)
            ->where('Email', $request->email)
            ->first();

        if (!$gv && !$ncs) {
            return back()->with('error', 'Email không khớp với tài khoản');
        }

        $user->MatKhau = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Đổi mật khẩu thành công');
    }

}
