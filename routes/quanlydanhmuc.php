<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\LoaiDeTaiController;

Route::middleware(['web', 'role:admin'])
    ->prefix('admin/danhmuc')
    ->group(function () {

        Route::get('/', [LoaiDeTaiController::class, 'index'])->name('danhmuc.index');

        Route::post('/store', [LoaiDeTaiController::class, 'store'])->name('danhmuc.store');

        Route::put('/update/{id}', [LoaiDeTaiController::class, 'update'])->name('danhmuc.update');

        Route::delete('/delete/{id}', [LoaiDeTaiController::class, 'destroy'])->name('danhmuc.delete');
});