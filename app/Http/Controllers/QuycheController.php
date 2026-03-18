<?php

namespace App\Http\Controllers;
use App\Models\Quyche;

use Illuminate\Http\Request;

class QuycheController extends Controller
{
    public function index_admin(Request $request)
    {
        $query = Quyche::query();

        if ($request->search) {
            $query->where('TenVanBan', 'like', '%' . $request->search . '%');
        }
        $quyches = $query->paginate(10)->withQueryString();

        return view('Admin.quyChe.index', compact('quyches'));
    }
    public function index_giangvien(Request $request)
    {
        $query = Quyche::query();

        if ($request->search) {
            $query->where('TenVanBan', 'like', '%' . $request->search . '%');
        }
        $quyches = $query->paginate(10)->withQueryString();

        return view('Giangvien.quyChe.index', compact('quyches'));
    }

    public function create()
    {
        return view('Admin.quyChe.create');
    }

    public function destroy($id)
    {
        $quyche = Quyche::find($id);

        if (!$quyche) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $quyche->delete();

        return response()->json(['success' => true]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'TenVanBan' => 'required|string|max:255',
            'NoiDung' => 'required|string',
        ]);

        Quyche::create([
            'TenVanBan' => $request->TenVanBan,
            'NoiDung' => $request->NoiDung,
        ]);

        return redirect()->route('admin.quyChe.index')->with('success', 'Quy chế khoa học đã được tạo thành công.');
    }
}
