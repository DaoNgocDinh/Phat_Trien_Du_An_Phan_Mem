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

Route::get('/giangvien/quy-che', function () {
    return view('Giangvien.quyChe');
});