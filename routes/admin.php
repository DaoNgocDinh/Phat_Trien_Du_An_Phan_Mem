<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuycheController;
use App\Http\Controllers\LienHeController;
Route::prefix('admin')->middleware('roles:admin')->group(function () {
    Route::get('/trang-chu', [AdminController::class, 'dashBoard'])->name('admin.trangChu');

    Route::get('/quyche', [QuycheController::class, 'index_admin'])->name('admin.quyChe.index');
    Route::get('/quyche/create', [QuycheController::class, 'create'])->name('admin.quyChe.create');
    Route::post('/quyche', [QuycheController::class, 'store'])->name('admin.quyChe.store');
    Route::get('/quyche/{MaQuyChe}/edit', [QuycheController::class, 'edit'])->name('admin.quyChe.edit');
    Route::put('/quyche/{MaQuyChe}', [QuycheController::class, 'update'])->name('admin.quyChe.update');
    Route::get('/quyche/{MaQuyChe}', [QuyCheController::class, 'view'])->name('admin.quyChe.view');
    Route::get('/lienhe/unreadcount', [LienHeController::class, 'getSoLuong'])->name('lienhe.count');
    Route::get('/lienhe/unreadlist', [LienHeController::class, 'getDanhSach'])->name('lienhe.list');

    Route::get('/lienhe', [LienHeController::class,'index_admin'])->name('admin.lienhe.index');
    Route::get('/lienhe/{MaLienHe}', [LienHeController::class, 'detail'])->name('admin.lienhe.detail');
});
