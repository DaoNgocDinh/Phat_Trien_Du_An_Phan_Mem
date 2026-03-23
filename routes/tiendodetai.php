<?php
use App\Http\Controllers\TienDoDeTaiController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->middleware('roles:admin')->group(function () {

    // Trang danh sách
    Route::get('/theodoitiendo', [TienDoDeTaiController::class, 'index'])
        ->name('admin.theodoitiendo.index');

    // Lấy chi tiết
    Route::get('/theodoitiendo/{MaDeTai}', [TienDoDeTaiController::class, 'show'])
        ->name('admin.theodoitiendo.show');

    // Lấy data tiến độ
    Route::get('/theodoitiendo/data/{MaDeTai}', [TienDoDeTaiController::class,'getData'])
        ->name('admin.theodoitiendo.data');

    // Cập nhật tiến độ
    Route::post('/theodoitiendo/capnhat', [TienDoDeTaiController::class, 'capNhatTienDo'])
        ->name('admin.theodoitiendo.capnhat');

});

Route::prefix('giangvien')->middleware('roles:giangvien')->group(function () {
    Route::post('/cap-nhat-tien-do', [TienDoDeTaiController::class, 'store'])
         ->name('giangvien.capNhatTienDo');
});
