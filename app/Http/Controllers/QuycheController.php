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

        return view('Admin.quyChe.quyChe', compact('quyches'));
    }
    public function index_giangvien(Request $request)
    {
        $query = Quyche::query();

        if ($request->search) {
            $query->where('TenVanBan', 'like', '%' . $request->search . '%');
        }
        $quyches = $query->paginate(10)->withQueryString();

        return view('Giangvien.quyChe.quyChe', compact('quyches'));
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
}
