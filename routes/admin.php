<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuyCheController;
use App\Http\Controllers\LienHeController;
Route::prefix('admin')->middleware('roles:admin')->group(function () {
    Route::get('/trang-chu', [AdminController::class, 'dashBoard'])->name('admin.trangChu');

    Route::get('/quyche', [QuyCheController::class, 'index_admin'])->name('admin.quyChe.index');
    Route::get('/quyche/create', [QuyCheController::class, 'create'])->name('admin.quyChe.create');
    Route::post('/quyche', [QuyCheController::class, 'store'])->name('admin.quyChe.store');
    Route::get('/quyche/{MaQuyChe}/edit', [QuyCheController::class, 'edit'])->name('admin.quyChe.edit');
    Route::put('/quyche/{MaQuyChe}', [QuyCheController::class, 'update'])->name('admin.quyChe.update');
    Route::get('/quyche/{MaQuyChe}', [QuyCheController::class, 'view'])->name('admin.quyChe.view');
    Route::get('/lienhe/unreadcount', [LienHeController::class, 'getSoLuong'])->name('lienhe.count');
    Route::get('/lienhe/unreadlist', [LienHeController::class, 'getDanhSach'])->name('lienhe.list');

    Route::get('/lienhe', [LienHeController::class,'index_admin'])->name('admin.lienhe.index');
    Route::get('/lienhe/{MaLienHe}', [LienHeController::class, 'detail'])->name('admin.lienhe.detail');

    Route::get('/search', [AdminController::class, 'search'])->name('admin.search');

    // Quản lý Sự kiện (Admin)
    Route::get('/admin/su-kien', [AdminController::class, 'suKienIndex'])->name('admin.sukien.index');
    Route::post('/admin/su-kien/store', [AdminController::class, 'suKienStore'])->name('admin.sukien.store');
    Route::put('/admin/su-kien/update/{id}', [AdminController::class, 'suKienUpdate'])->name('admin.sukien.update');
    Route::delete('/admin/su-kien/delete/{id}', [AdminController::class, 'suKienDestroy'])->name('admin.sukien.destroy');
});
