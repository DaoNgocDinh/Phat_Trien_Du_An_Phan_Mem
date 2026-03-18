<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('roles:admin')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('admin.register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('admin.register.process');

});

Route::middleware('roles:giangvien,nghiencuusinh')->group(function () {

    Route::get('/doi-mat-khau', [AuthController::class, 'showChangePassword'])
        ->name('admin.changePassword');

    Route::post('/doi-mat-khau', [AuthController::class, 'changePassword'])
        ->name('admin.changePassword.post');

});

Route::get('/quen-mat-khau', [AuthController::class, 'showForgotPassword'])->name('forgotPassword');
Route::post('/quen-mat-khau', [AuthController::class, 'handleForgotPassword'])->name('forgotPassword.post');