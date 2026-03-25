<?php

use App\Http\Controllers\LienHeController;
use App\Http\Controllers\SinhvienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuycheController;


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/congbo.php';
require __DIR__ . '/giangvien.php';
require __DIR__ . '/user.php';
require __DIR__ . '/detai.php';
require __DIR__ . '/tiendodetai.php';
require __DIR__ . '/hoso.php';
require __DIR__ . '/pheduyetdexuat.php';
require __DIR__ . '/quanlydanhmuc.php';

use App\Http\Controllers\GiangVienController;
Route::get('/', function () {

    if (session('UserID')) {

        if (session('VaiTro') == 'admin') {
            return redirect()->route('admin.trangChu');
        }

        if (session('VaiTro') == 'giangvien') {
            return redirect()->route('  .trangChu');
        }

        if (session('VaiTro') == 'nghiencuusinh') {
            return redirect()->route('giangvien.trangChu');
        }
    }

    return view('Sinhvien.trangChu'); // hoặc route login của bạn
});

Route::get('/admin/quy-che', function () {
    return view('Admin.quyChe');
});




//// Dăng

// auth

Route::delete('/admin/destroyquyche/{id}', [QuyCheController::class, 'destroy'])->name('quyche.destroy');

Route::get('/guiyeucaulienhe', function () {
    return view('Sinhvien.guiYeuCaulienHe');
});

Route::get('/dexuatTNKH', function () {
    return view('Sinhvien.deXuatThemtnKH');
});

Route::get('/admin/courses/edit', function () {
    return view('Admin.khoahoc.edit');
});
Route::get('/admin/report/dashboard', function () {
    return view('Admin.thongke.dashboard');
});
Route::get('/admin/report/create', function () {
    return view('Admin.thongke.create');
});


// ROUTE CHO SINH VIÊN (GUEST)
Route::prefix('guest')->group(function () {
    Route::get('/trang-chu', [SinhvienController::class, 'dashBoard'])
        ->name('sinhvien.trangChu');

    Route::get('/cong-bo', [SinhvienController::class, 'CongBo'])
        ->name('sinhvien.congBo');
    Route::get('/de-tai', [SinhvienController::class, 'DeTai'])
        ->name('sinhvien.deTai');
    Route::get('/quy-che', [QuyCheController::class, 'index_guest'])->name('sinhvien.quyChe.index');
    Route::get('/quy-che/{id}', [QuyCheController::class, 'view_sinhvien'])->name('sinhvien.quyChe.view');

    Route::get('/su-kien', [SinhvienController::class, 'SuKien'])->name('sinhvien.suKien');

    // Trang hiển thị form liên hệ của Sinh viên
    Route::get('/lien-he', [LienHeController::class, 'index_SV'])->name('sinhvien.lienhe.index');

    Route::get('/search', [SinhvienController::class, 'search'])->name('sinhvien.search');

    // Tận dụng luôn hàm store của LienHeController để xử lý lưu data
    Route::post('/lien-he', [LienHeController::class, 'store'])->name('sinhvien.lienhe.store');
});