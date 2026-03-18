<?php

use App\Http\Controllers\SinhvienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuycheController;


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/congbo.php';
require __DIR__.'/giangvien.php';
require __DIR__.'/user.php';






Route::prefix('sinhVien')->group(function () {

    Route::get('/trang-chu',[SinhvienController::class,'dashBoard'])
        ->name('sinhVien.trangChu');

});


Route::delete('/admin/destroyquyche/{id}', [QuycheController::class,'destroy'])->name('quyche.destroy');

Route::get('/guiyeucaulienhe', function () {
    return view('Sinhvien.guiYeuCaulienHe');
});

Route::get('/dexuatTNKH', function () {
    return view('Sinhvien.deXuatThemtnKH');
});
// admin
// Route::get('/admin/courses', function () {
//     return view('Admin.khoahoc.khoahoc');
// });
Route::get('/admin/courses/edit', function () {
    return view('Admin.khoahoc.edit');
});
Route::get('/admin/report/dashboard', function () {
    return view('Admin.thongke.dashboard');
});
Route::get('/admin/report/create', function () {
    return view('Admin.thongke.create');
});
