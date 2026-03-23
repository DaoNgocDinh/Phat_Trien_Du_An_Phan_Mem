<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\LoaiDeTaiController;

Route::middleware(['web', 'roles:admin'])
    ->prefix('admin/danhmuc')
    ->name('admin.danhmuc.') // 👈 thêm dòng này
    ->group(function () {

        Route::get('/', [LoaiDeTaiController::class, 'index'])->name('index');

        Route::post('/store', [LoaiDeTaiController::class, 'store'])->name('store');

        Route::put('/update/{id}', [LoaiDeTaiController::class, 'update'])->name('update');

        Route::delete('/delete/{id}', [LoaiDeTaiController::class, 'destroy'])->name('delete');
});