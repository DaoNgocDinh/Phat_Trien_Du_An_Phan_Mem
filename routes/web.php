<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SinhvienController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CongBoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeTaiController;
use App\Http\Controllers\TienDoDeTaiController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('/trang-chu', [AdminController::class, 'dashBoard'])
        ->name('admin.trangChu');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('admin.register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('admin.register.process');


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
});




Route::prefix('sinhVien')->group(function () {

    Route::get('/trang-chu', [SinhvienController::class, 'dashBoard'])
        ->name('sinhVien.trangChu');
});

Route::get('/admin/quy-che', function () {
    return view('Admin.quyChe');
});




//// Dăng
Route::prefix('admin')->middleware('role:admin')->group(function () {

    Route::get('/detai', [DeTaiController::class, 'index'])
        ->name('admin.detai.index');

    Route::get('/detai/create', [DeTaiController::class, 'create'])
        ->name('admin.detai.create');

    Route::post('/detai/store', [DeTaiController::class, 'store'])
        ->name('admin.detai.store');

    Route::get('/detai/{MaSo}/edit', [DeTaiController::class, 'edit'])
        ->name('admin.detai.edit');

    Route::put('/detai/{MaSo}', [DeTaiController::class, 'update'])
        ->name('admin.detai.update');

    Route::delete('/detai/{MaSo}', [DeTaiController::class, 'destroy'])
        ->name('admin.detai.destroy');

    ////Theo dõi tiến độ đề tài
    Route::get('/theodoitiendo', [TienDoDeTaiController::class, 'index'])
        ->name('admin.theodoitiendo.index');

    Route::get('/theodoitiendo/{MaDeTai}', [TienDoDeTaiController::class, 'show'])
        ->name('admin.theodoitiendo.show');

    Route::get('/admin/theodoitiendo/data/{MaDeTai}',[TienDoDeTaiController::class,'getData'])
        ->name('admin.theodoitiendo.data');

    Route::get('/admin/theodoitiendo/{id}',[App\Http\Controllers\TienDoDeTaiController::class,'show']);
    Route::post('/admin/theodoitiendo/capnhat', [TienDoDeTaiController::class, 'capNhatTienDo']);

    
});

// auth
// Route::get('/auth/login', function () {
//     return view('auth.login');
// });

// Route::post('/auth/login', function () {
//     return "Đăng nhập xử lý ở đây";
// })->name('login');

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

// #QUANLYDANHMUC
// Route::get('/admin/danhmuc', function () {
//     return view('Admin.quanlydanhmuc.index');
// });

// Route::get('/admin/danhmuc/create', function () {
//     return view('Admin.quanlydanhmuc.create');
// });

// Route::get('/admin/danhmuc/edit', function () {
//     return view('Admin.quanlydanhmuc.edit');
// });

// ///CHỈNH SỬA HỒ SƠ CÁ NHÂN
// Route::get('/hoso/chinhsua', function () {
//     return view('Giangvien.hosocanhan.edit');
// });

// ///PHÊ DUYỆT ĐỀ XUẤT
// Route::get('/pheduyetdexuat', function () {
//     return view('Admin.pheduyetdexuat.index');
// });

// //THEO DÕI TIẾN ĐỒ ĐỀ TÀI
// Route::get('/theodoitiendo', function () {
//     return view('Admin.theodoitiendo.index');
// });