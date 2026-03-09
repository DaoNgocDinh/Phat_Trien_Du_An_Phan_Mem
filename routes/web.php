<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin/courses', function () {
    return view('Admin.khoahoc.khoahoc');
});
Route::get('/admin/courses/edit', function () {
    return view('Admin.khoahoc.edit');
});
Route::get('/admin/dashboard', function () {
    return view('Admin.thongke.dashboard');
});
