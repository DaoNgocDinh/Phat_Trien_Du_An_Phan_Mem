<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuycheController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test.index');
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