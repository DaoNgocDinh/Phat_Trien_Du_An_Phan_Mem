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

#QUANLYDANHMUC
Route::get('/admin/danhmuc', function () {
    return view('Admin.quanlydanhmuc.index');
});

Route::get('/admin/danhmuc/create', function () {
    return view('Admin.quanlydanhmuc.create');
});

Route::get('/admin/danhmuc/edit', function () {
    return view('Admin.quanlydanhmuc.edit');
});

///CHỈNH SỬA HỒ SƠ CÁ NHÂN
Route::get('/hoso/chinhsua', function () {
    return view('Giangvien.hosocanhan.edit');
});

///PHÊ DUYỆT ĐỀ XUẤT
Route::get('/pheduyetdexuat', function () {
    return view('Admin.pheduyetdexuat.index');
});

//THEO DÕI TIẾN ĐỒ ĐỀ TÀI
Route::get('/theodoitiendo', function () {
    return view('Admin.theodoitiendo.index');
});