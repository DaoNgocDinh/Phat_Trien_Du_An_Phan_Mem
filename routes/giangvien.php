<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiangVienController;

Route::prefix('giangvien')->group(function () {
    Route::get('/trang-chu', [GiangVienController::class, 'dashBoard'])
        ->name('giangvien.trangChu');
    Route::get('/cong-bo', [GiangVienController::class, 'CongBo'])
        ->name('giangvien.congBo');
    Route::get('/de-tai', [GiangVienController::class, 'DeTai'])
        ->name('giangvien.deTai');
    Route::get('/su-kien', [GiangVienController::class, 'SuKien'])
        ->name('giangvien.suKien');
});
