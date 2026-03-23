<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinhvienController;


Route::prefix('sinhvien')->group(function () {
    Route::get('/trang-chu', [SinhvienController::class, 'dashBoard'])
        ->name('sinhvien.trangChu');
    Route::get('/cong-bo', [SinhvienController::class, 'CongBo'])
        ->name('sinhvien.congBo');
});
