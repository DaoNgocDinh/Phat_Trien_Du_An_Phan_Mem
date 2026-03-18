<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinhvienController extends Controller
{
    //
    public function dashBoard()
    {
        return view('sinhVien.trangChu');
    }
}
