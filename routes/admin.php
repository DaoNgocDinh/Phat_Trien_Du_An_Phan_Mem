<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('/trang-chu',[AdminController::class,'dashBoard'])
        ->name('admin.trangChu');

});
