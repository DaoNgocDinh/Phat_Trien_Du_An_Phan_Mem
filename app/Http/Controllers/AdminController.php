<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lienhe;

class AdminController extends Controller
{
    //
    public function dashBoard()
    {
        $soluong = Lienhe::where('TrangThai', 'Chưa đọc')->count();

        return view('Admin.trangChu', compact('soluong'));
    }
}
