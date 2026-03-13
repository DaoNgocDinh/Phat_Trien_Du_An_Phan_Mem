<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.process');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('/register',[AuthController::class,'showRegister'])
        ->name('admin.register');

    Route::post('/register',[AuthController::class,'register'])
        ->name('admin.register.process');

});


