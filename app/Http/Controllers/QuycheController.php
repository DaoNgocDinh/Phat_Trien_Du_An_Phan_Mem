<?php

namespace App\Http\Controllers;
use App\Models\Quyche;

use Illuminate\Http\Request;

class QuyCheController extends Controller
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
        $quyches = Quyche::all();
        $MaQuyChe = $quyches->max('MaQuyChe') + 1;
        $SoHieu = 'QC' . str_pad($MaQuyChe, 4, '0', STR_PAD_LEFT);


        return view('Admin.quyChe.create', compact('MaQuyChe', 'SoHieu', 'quyches'));
    }

    public function destroy($id)
    {
        $quyche = Quyche::find($id);

        if (!$quyche) {
            return response()->json(['message' => 'Not found'], 404);
        }

        if ($quyche->FilePDF && file_exists(public_path('uploads/pdf/' . $quyche->FilePDF))) {
            unlink(public_path('uploads/pdf/' . $quyche->FilePDF));
        }

        $quyche->delete();

        return response()->json(['success' => true]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'TenVanBan' => 'required',
            'NgayPhatHanh' => 'required',
            'LoaiVanBan' => 'required',
            'FilePDF' => 'required'
        ]);

        if ($request->hasFile('FilePDF')) {
            $file = $request->file('FilePDF');

            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads/pdf'), $fileName);
        }

        $MaQuyChe = Quyche::max('MaQuyChe') + 1;
        $SoHieu = 'QC' . str_pad($MaQuyChe, 4, '0', STR_PAD_LEFT);

        Quyche::create([
            'MaQuyChe' => $MaQuyChe,
            'TenVanBan' => $request->TenVanBan,
            'SoHieu' => $SoHieu,
            'NgayBanHanh' => $request->NgayPhatHanh,
            'LoaiVanBan' => $request->LoaiVanBan,
            'FilePDF' => $fileName ?? null,
        ]);

        return redirect()->route('admin.quyChe.index')->with('success', 'Thêm thành công');
    }
    public function edit($id)
    {
        $quyche = Quyche::findOrFail($id);

        return view('Admin.quyChe.edit', compact('quyche'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'TenVanBan' => 'required',
            'NgayPhatHanh' => 'required',
            'LoaiVanBan' => 'required',
            'FilePDF' => 'nullable|mimes:pdf'
        ]);

        $quyche = Quyche::findOrFail($id);

        if ($request->hasFile('FilePDF')) {
            if ($quyche->FilePDF && file_exists(public_path('uploads/pdf/' . $quyche->FilePDF))) {
                unlink(public_path('uploads/pdf/' . $quyche->FilePDF));
            }

            $file = $request->file('FilePDF');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/pdf'), $fileName);
            $quyche->FilePDF = $fileName;
        }

        $quyche->TenVanBan = $request->TenVanBan;
        $quyche->NgayBanHanh = $request->NgayPhatHanh;
        $quyche->LoaiVanBan = $request->LoaiVanBan;

        $quyche->save();

        return redirect()->route('admin.quyChe.index')->with('success', 'Cập nhật thành công');
    }

    public function view($MaQuyChe)
    {
        $quyche = QuyChe::findOrFail($MaQuyChe);
        return view('admin.quyche.view', compact('quyche'));
    }

    public function view_giangvien($MaQuyChe)
    {
        $quyche = QuyChe::findOrFail($MaQuyChe);
        return view('Giangvien.quyChe.view', compact('quyche'));
    }

    public function view_sinhvien($MaQuyChe)
    {
        $quyche = QuyChe::findOrFail($MaQuyChe);
        return view('Sinhvien.quyChe.view', compact('quyche'));
    }

    public function download($file)
    {
        $path = public_path('uploads/pdf/' . $file);

        if (!file_exists($path)) {
            abort(404);
        }

        $originalName = explode('_', $file, 2)[1] ?? $file;

        return response()->download($path, $originalName);
    }
    public function index_guest()
    {
        $quyches = QuyChe::where('LoaiVanBan', '!=', 'Nội Bộ')
            ->latest('NgayBanHanh')
            ->paginate(10);

        return view('Sinhvien.quyChe', compact('quyches'));
    }
}
