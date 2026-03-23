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
require __DIR__.'/pheduyetdexuat.php';
require __DIR__.'/quanlydanhmuc.php';

use App\Http\Controllers\GiangVienController;

Route::get('/admin/quy-che', function () {
    return view('Admin.quyChe');
});




//// Dăng

// auth

Route::delete('/admin/destroyquyche/{id}', [QuyCheController::class,'destroy'])->name('quyche.destroy');

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

#QUANLYDANHMUC
// Route::get('/admin/danhmuc', function () {
//     return view('Admin.quanlydanhmuc.index');
// });

// Route::get('/admin/danhmuc/create', function () {
//     return view('Admin.quanlydanhmuc.create');
// });

// Route::get('/admin/danhmuc/edit', function () {
//     return view('Admin.quanlydanhmuc.edit');
// });

// ///CHỈNH SỬA HỒ SƠ CÁ NHÂN
// Route::get('/hoso/chinhsua', function () {
//     return view('Giangvien.hosocanhan.edit');
// });

///PHÊ DUYỆT ĐỀ XUẤT
// Route::get('/pheduyetdexuat', function () {
//     return view('Admin.pheduyetdexuat.index');
// });

//THEO DÕI TIẾN ĐỒ ĐỀ TÀI
// Route::get('/theodoitiendo', function () {
//     return view('Admin.theodoitiendo.index');
// });
