<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\QuyCheController;
use App\Http\Controllers\DeTaiController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\CongBoController;
use App\Http\Controllers\TienDoDeTaiController;

Route::prefix('giangvien')->middleware('roles:giangvien,nghiencuusinh')->group(function () {
    Route::get('/trang-chu', [GiangVienController::class, 'dashBoard'])
        ->name('giangvien.trangChu');

    Route::get('/cong-bo', [GiangVienController::class, 'CongBo'])
        ->name('giangvien.congBo');
    Route::get('/giangvien/cong-bo-cua-toi', [CongBoController::class, 'congBoCuaToi'])->name('giangvien.congBoCuaToi');

    Route::get('/de-tai', [GiangVienController::class, 'DeTai'])
        ->name('giangvien.deTai');
    Route::get('/de-tai-cua-toi', [GiangVienController::class, 'DeTaiCuaToi'])
        ->name('giangvien.deTaiCuaToi');

    Route::get('/su-kien', [GiangVienController::class, 'SuKien'])
        ->name('giangvien.suKien');
    Route::post('/su-kien/dang-ky', [GiangVienController::class, 'dangKySuKien'])->name('giangvien.sukien.dangky');
    Route::post('/su-kien/huy-dang-ky', [GiangVienController::class, 'huyDangKySuKien'])->name('giangvien.sukien.huydangky');

    Route::get('/quyche', [QuyCheController::class, 'index_giangvien'])->name('giangvien.quyChe.index');
    Route::get('/quyche/{MaQuyChe}', [QuyCheController::class, 'view_giangvien'])->name('giangvien.quyChe.view');
    Route::get('/download/{file}', [QuyCheController::class, 'download'])->name('download.pdf');

    Route::get('/detai/dexuat', [DeTaiController::class, 'sugget'])->name('giangvien.detai.sugget');
    Route::get('/detai', [DeTaiController::class, 'index_Giangvien'])->name('giangvien.detai.index');
    Route::post('/detai', [DeTaiController::class, 'store'])->name('giangvien.detai.store');
    Route::get('/detai/download-bao-cao/{file}', [\App\Http\Controllers\TienDoDeTaiController::class, 'downloadBaoCao'])
    ->where('file', '.*') // Cho phép tham số chứa dấu gạch chéo (/)
    ->name('giangvien.tiendo.downloadBaoCao');

    Route::get('/lienhe', [LienHeController::class, 'index'])->name('giangvien.lienhe.index');
    Route::post('/lienhe', [LienHeController::class, 'store'])->name('giangvien.lienhe.store');

    Route::get('/search', [GiangvienController::class, 'search'])->name('giangvien.search');

    Route::get('/congbo/dexuat', [CongBoController::class, 'showSuggest'])->name('giangvien.congbo.suggest');
    Route::post('/congbo/dexuat', [CongBoController::class, 'suggest']);

    Route::get('/api/thong-bao', [\App\Http\Controllers\GiangVienController::class, 'getThongBaoAPI'])->name('giangvien.api.thongbao');
    Route::post('/api/thong-bao/read-all', [\App\Http\Controllers\GiangVienController::class, 'markAllReadAPI']);
    Route::post('/api/thong-bao/read/{id}', [\App\Http\Controllers\GiangVienController::class, 'markReadAPI']);
});