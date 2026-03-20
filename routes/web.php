<?php

use App\Http\Controllers\SinhvienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuycheController;


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/congbo.php';
require __DIR__.'/giangvien.php';
require __DIR__.'/user.php';
require __DIR__.'/detai.php';
require __DIR__.'/tiendodetai.php';
require __DIR__.'/hoso.php';






Route::prefix('sinhVien')->group(function () {

    Route::get('/trang-chu', [SinhvienController::class, 'dashBoard'])
        ->name('sinhVien.trangChu');
});

Route::get('/admin/quyche', [QuycheController::class, 'index_admin']);

Route::get('/giangvien/quyche', [QuycheController::class, 'index_giangvien']);

Route::delete('/admin/destroyquyche/{id}', [QuycheController::class,'destroy'])->name('quyche.destroy');

Route::get('/guiyeucaulienhe', function () {
    return view('Sinhvien.guiYeuCaulienHe');
});

Route::get('/dexuatTNKH', function () {
    return view('Sinhvien.deXuatThemtnKH');
});
