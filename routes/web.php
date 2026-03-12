<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CongBoController;

Route::prefix('admin')->group(function(){

    Route::get('courses',[CongBoController::class,'index'])->name('khoahoc.khoahoc');

    Route::post('courses/store',[CongBoController::class,'store'])->name('congbo.store');

    Route::post('courses/update/{id}',[CongBoController::class,'update'])->name('congbo.update');

    Route::get('courses/delete/{id}',[CongBoController::class,'destroy'])->name('congbo.delete');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test.index');
});

Route::get('/admin/quy-che', function () {
    return view('Admin.quyChe');
});

// auth
Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::post('/auth/login', function () {
    return "Đăng nhập xử lý ở đây";
})->name('login');

Route::get('/auth/forgot-password', function () {
    return view('auth.forgot_password');
});

// admin
// Route::get('/admin/courses', function () {
//     return view('Admin.khoahoc.khoahoc');
// });
Route::get('/admin/courses/edit', function () {
    return view('Admin.khoahoc.edit');
});
Route::get('/admin/report/dashboard', function () {
    return view('Admin.thongke.dashboard');
});
Route::get('/admin/report/create', function () {
    return view('Admin.thongke.create');
});
