<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuycheController;
Route::prefix('admin')->middleware('roles:admin')->group(function () {
    Route::get('/trang-chu',[AdminController::class,'dashBoard'])
        ->name('admin.trangChu');
    Route::get('/quyche',[QuycheController::class,'index_admin'])->name('admin.quyChe.index');
    Route::get('/quyche/create',[QuycheController::class,'create'])->name('admin.quyChe.create');
    Route::post('/quyche',[QuycheController::class,'store'])->name('admin.quyChe.store');
});
