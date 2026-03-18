<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiangvienController extends Controller
{
    //
    public function index()
    {
        return view('Giangvien.trangChu');
    }
}
