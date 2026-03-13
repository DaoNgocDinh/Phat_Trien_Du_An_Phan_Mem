<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taikhoan;

class UserController extends Controller
{
    public function index()
    {
        $users = Taikhoan::with([
            'Giangvien',
            'Nghiencuusinh'
        ])->paginate(10);
        return view('Admin.users.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = Taikhoan::findOrFail($id);

        // xóa đăng ký sự kiện
        $user->dangkysukien()->delete();

        if ($user->giangvien) {
            $user->giangvien->delete();
        }

        if ($user->nghiencuusinh) {
            $user->nghiencuusinh->delete();
        }

        if ($user->canbokhoahoc) {
            $user->canbokhoahoc->delete();
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Xóa người dùng thành công');
    }

}