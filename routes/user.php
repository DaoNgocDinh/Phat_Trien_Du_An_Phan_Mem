<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('admin')->middleware('role:admin')->group(function () {

    Route::get('/users', [UserController::class,'index'])->name('admin.users.index');

    Route::delete('/users/{id}/delete', [UserController::class,'destroy'])->name('admin.users.destroy');

});