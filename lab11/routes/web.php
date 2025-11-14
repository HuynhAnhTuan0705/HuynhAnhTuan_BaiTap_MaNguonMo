<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\TinTucController as AdminTinTuc;

Route::get('/', [PublicController::class,'index'])->name('home');
Route::get('/tin/{id}', [PublicController::class,'show'])->name('tin.show');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => redirect()->route('admin.tin.index'))->name('home');
    Route::resource('danhmuc', DanhMucController::class);
    Route::resource('tin', AdminTinTuc::class);
    Route::post('tin/{id}/restore', [AdminTinTuc::class,'restore'])->name('tin.restore');
    Route::delete('tin/{id}/force', [AdminTinTuc::class,'forceDelete'])->name('tin.force');
});

require __DIR__.'/auth.php';
