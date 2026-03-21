<?php
use App\Http\Controllers\Admin\PheDuyetController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('role:admin')->group(function () {

    Route::get('/pheduyet', [PheDuyetController::class, 'index']);

    Route::get('/pheduyet/{id}', [PheDuyetController::class, 'show']);

    Route::post('/pheduyet/{id}/approve', [PheDuyetController::class, 'approve']);

    Route::post('/pheduyet/{id}/reject', [PheDuyetController::class, 'reject']);

});