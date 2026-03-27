<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lienhe;

class LienHeController extends Controller
{
    //
    public function index()
    {
        return view('Giangvien.LienHe.index');
    }
    public function index_SV()
    {
        return view('Sinhvien.LienHe.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'subject.required' => 'Vui lòng nhập chủ đề',
            'message.required' => 'Vui lòng nhập nội dung',
        ]);
        $maxId = Lienhe::max('MaLienHe');
        $newId = $maxId ? $maxId + 1 : 1;

        Lienhe::create([
            'MaLienHe' => $newId,
            'HoTen' => $request->name,
            'Email' => $request->email,
            'ChuDe' => $request->subject,
            'NoiDung' => $request->message,
            'TrangThai' => 'Chưa đọc'
        ]);

        return back()->with('success', 'Gửi yêu cầu thành công!');
    }
    public function getSoLuong()
    {
        $count = Lienhe::where('TrangThai', 'Chưa đọc')->count();

        return response()->json([
            'soLuong' => $count
        ]);
    }
    public function getDanhSach()
    {
        $list = Lienhe::where('TrangThai', 'Chưa đọc')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get(['MaLienHe', 'HoTen']);

        return response()->json($list);
    }

    public function index_admin(Request $request)
    {
        $query = Lienhe::query();

        $lienhes = $query->paginate(10)->withQueryString();

        return view('Admin.lienhe.index', compact('lienhes'));
    }
    public function detail($MaLienHe)
    {
        $lienhe = Lienhe::findOrFail($MaLienHe);

        if ($lienhe->TrangThai === 'Chưa đọc') {
            $lienhe->TrangThai = 'Đã đọc';
            $lienhe->save();
        }

        return view('Admin.lienhe.detail', compact('lienhe'));
    }
}