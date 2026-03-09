<?php

use App\Http\Controllers\SinhvienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test.index');
});

Route::get('/admin/quy-che', function () {
    return view('Admin.quyChe');
});

Route::prefix('admin')->group(function () {
    Route::get('/trang-chu', [AdminController::class, 'dashBoard'])
        ->name('admin.trangChu');
});

Route::prefix('sinhVien')->group(function () {
    Route::get('/trang-chu', [SinhvienController::class, 'dashBoard'])
        ->name('sinhVien.trangChu');
});