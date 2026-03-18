<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CongBoController;

Route::prefix('admin')->middleware('role:admin')->group(function () {

    Route::get('/congbo', [CongBoController::class, 'index'])
        ->name('admin.congbo.index');

    Route::get('/congbo/{id}', [CongBoController::class, 'show'])
        ->name('admin.congbo.show');

    Route::get('/congbo/{id}/edit', [CongBoController::class, 'edit'])
        ->name('admin.congbo.edit');

    Route::put('/congbo/{id}', [CongBoController::class, 'update'])
        ->name('admin.congbo.update');

    Route::delete('/congbo/{id}', [CongBoController::class, 'destroy'])
        ->name('admin.congbo.destroy');

    Route::get('/congbo/pheduyet/danhsach', [CongBoController::class, 'danhSachCongBo'])->name('admin.congbo.pheduyet.danhsach');

    Route::get('/congbo/pheduyet/{id}/chitiet', [CongBoController::class, 'chiTietCongBo'])->name('admin.congbo.pheduyet.chitiet');

    Route::post('/congbo/{id}/trangthai', [CongBoController::class, 'capNhatTrangThai'])->name('admin.congbo.trangthai');

});