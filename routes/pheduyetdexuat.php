<?php
use App\Http\Controllers\Admin\PheDuyetController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware('roles:admin')
    ->name('admin.pheduyet.') // 👈 thêm dòng này
    ->group(function () {

        Route::get('/pheduyet', [PheDuyetController::class, 'index'])->name('index');

        Route::get('/pheduyet/{id}', [PheDuyetController::class, 'show'])->name('show');

        Route::post('/pheduyet/{id}/approve', [PheDuyetController::class, 'approve'])->name('approve');

        Route::post('/pheduyet/{id}/reject', [PheDuyetController::class, 'reject'])->name('reject');

});