<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\Admin\TinTucAdminController;

// Public
Route::get('/', [TinTucController::class, 'index'])->name('tin.index');
Route::get('/tin/{id}', [TinTucController::class, 'show'])->name('tin.show');

// Admin (UI demo – chỉ giao diện)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.tin.index'));
    Route::get('/tin-tuc', [TinTucAdminController::class, 'index'])->name('tin.index');
    Route::get('/tin-tuc/create', [TinTucAdminController::class, 'create'])->name('tin.create');
    Route::get('/tin-tuc/{id}/edit', [TinTucAdminController::class, 'edit'])->name('tin.edit');
});
