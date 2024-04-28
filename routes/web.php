<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('curriculo')->group(function () {
        Route::get('/', [\App\Http\Controllers\CurriculumController::class, 'index'])->name('curriculum.index');
        Route::get('/novo', [\App\Http\Controllers\CurriculumController::class, 'create'])->name('curriculum.create');
        Route::post('/novo', [\App\Http\Controllers\CurriculumController::class, 'store'])->name('curriculum.store');
        Route::get('/{id}', [\App\Http\Controllers\CurriculumController::class, 'show'])->name('curriculum.show');
        Route::get('/{id}/editar', [\App\Http\Controllers\CurriculumController::class, 'edit'])->name('curriculum.edit');
        Route::put('/{id}', [\App\Http\Controllers\CurriculumController::class, 'update'])->name('curriculum.update');
        Route::delete('/{id}', [\App\Http\Controllers\CurriculumController::class, 'destroy'])->name('curriculum.destroy');
    });
});

// Rotas para login
Route::prefix('login')->group(function () {
    Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('/', [\App\Http\Controllers\LoginController::class, 'login'])->name('login.do');
});
