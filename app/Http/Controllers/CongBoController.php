<?php

namespace App\Http\Controllers;

use App\Models\CongBo;
use Illuminate\Http\Request;

class CongBoController extends Controller
{
    public function index(Request $request)
    {
        $query = CongBo::query();

        if ($request->string('filter')->lower()->toString() === 'pending') {
            $query->where('TrangThai', 'Chờ duyệt');
        }

        $congbos = $query->orderByDesc('created_at')->paginate(10)->withQueryString();

        return view('Admin.CongBo.index', compact('congbos'));
    }
}
