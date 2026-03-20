<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiangvienController;
use App\Http\Controllers\QuycheController;
use App\Http\Controllers\DeTaiController;
use App\Http\Controllers\LienHeController;
Route::prefix('giangvien')->middleware('roles:giangvien')->group(function () {
    Route::get('/trang-chu',[GiangvienController::class,'index'])->name('giangvien.trangChu');
    Route::get('/quyche',[QuycheController::class,'index_giangvien'])->name('giangvien.quyChe.index');
    Route::get('/quyche/{MaQuyChe}', [QuyCheController::class, 'view_giangvien'])->name('giangvien.quyChe.view');
    Route::get('/download/{file}', [QuyCheController::class, 'download'])->name('download.pdf');

    Route::get('/detai/dexuat', [DeTaiController::class, 'sugget'])->name('giangvien.detai.sugget');
    Route::get('/detai', [DeTaiController::class, 'index_Giangvien'])->name('giangvien.detai.index');
    Route::post('/detai', [DeTaiController::class, 'store'])->name('giangvien.detai.store');

    Route::get('/lienhe', [LienHeController::class, 'index'])->name('giangvien.lienhe.index');
    Route::post('/lienhe', [LienHeController::class, 'store'])->name('giangvien.lienhe.store');
});
