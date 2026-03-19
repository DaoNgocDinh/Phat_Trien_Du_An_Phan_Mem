<?php

use App\Http\Controllers\SinhvienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CongBoController;
use App\Http\Controllers\GiangVienController;

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
    // Alias để tránh resource hiểu "index" là {id}
    Route::get('congbo/index', [CongBoController::class, 'index'])->name('admin.congbo.index');
});

Route::prefix('sinhVien')->group(function () {
    Route::get('/trang-chu', [SinhvienController::class, 'dashBoard'])
        ->name('sinhVien.trangChu');
});

Route::prefix('giangVien')->group(function () {
    Route::get('/congBo', [GiangVienController::class, 'index'])
        ->name('giangVien.congBo');
});