<?php
use App\Http\Controllers\HoSoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::prefix('giangvien')->middleware('roles:giangvien,nghiencuusinh')->group(function () {

    Route::get('/hoso', [HoSoController::class,'edit'])->name('hoso.edit');

    Route::post('/hoso/update', [HoSoController::class,'update'])->name('hoso.update');

});