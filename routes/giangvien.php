<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiangvienController;
use App\Http\Controllers\QuycheController;
Route::prefix('giangvien')->middleware('roles:giangvien')->group(function () {
    Route::get('/trang-chu',[GiangvienController::class,'index'])
        ->name('giangvien.trangChu');
    Route::get('/quyche',[QuycheController::class,'index_giangvien'])->name('giangvien.quyChe.quyChe');
});
