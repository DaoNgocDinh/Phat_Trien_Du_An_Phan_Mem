<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Moodels\TaiKhoan;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'UserID' => 'required|unique:TAIKHOAN,UserID',
            'MatKhau' => 'required|min:6',
            'VaiTro' => 'giangvien'
        ]);

        $user = TaiKhoan::create([
            'UserID' => $request->UserID,
            'MatKhau' => Hash::make($request->MatKhau),
            'VaiTro' => $request->VaiTro
        ]);

        return response()->json([
            'message' => 'Tạo tài khoản thành công',
            'user' => $user
        ]);
    }

    public function login(Request $request)
    {
        $user = DB::table("taikhoan")->where("email", $request->email)
                                         ->where("password", $request->password)
                                         ->first();
    }   
}
