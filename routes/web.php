<?php

use App\Http\Controllers\SinhvienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CongBoController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.process');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');



Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/trang-chu',[AdminController::class,'dashBoard'])
        ->name('admin.trangChu');

    Route::get('/register',[AuthController::class,'showRegister'])
        ->name('admin.register');

    Route::post('/register',[AuthController::class,'register'])
        ->name('admin.register.process');


    Route::get('/congbo',[CongBoController::class,'index'])
        ->name('admin.congbo.index');

    Route::get('/congbo/{id}',[CongBoController::class,'show'])
        ->name('admin.congbo.show');

    Route::get('/congbo/{id}/edit',[CongBoController::class,'edit'])
        ->name('admin.congbo.edit');

    Route::put('/congbo/{id}',[CongBoController::class,'update'])
        ->name('admin.congbo.update');

    Route::delete('/congbo/{id}',[CongBoController::class,'destroy'])
        ->name('admin.congbo.destroy');

});




Route::prefix('sinhVien')->group(function () {

    Route::get('/trang-chu',[SinhvienController::class,'dashBoard'])
        ->name('sinhVien.trangChu');

});