<?php
use App\Http\Controllers\DeTaiController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('roles:admin')->group(function () {

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
});