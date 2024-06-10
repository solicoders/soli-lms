<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_rh\PersonneController;

// Namespace all routes within this file
Route::middleware('auth')->group(function () {
        Route::prefix('Apprenant')->group(function () {
            Route::get('/', [PersonneController::class, 'index'])->name('Apprenant.index');
            Route::get('/form-ajouter', [PersonneController::class, 'create'])->name('Apprenant.create');
            Route::post('/ajouter', [PersonneController::class, 'store'])->name('Apprenant.store');
            Route::get('/{id}', [PersonneController::class, 'show'])->name('Apprenant.show');
            Route::get('/{id}/edit', [PersonneController::class, 'edit'])->name('Apprenant.edit');
            Route::post('/{id}/update', [PersonneController::class, 'update'])->name('Apprenant.update');
            Route::delete('/{id}/delete', [PersonneController::class, 'destroy'])->name('Apprenant.delete');
        });
        Route::prefix('Formateur')->group(function () {
            Route::get('/', [PersonneController::class, 'index'])->name('Formateur.index');
            Route::get('/form-ajouter', [PersonneController::class, 'create'])->name('Formateur.create');
            Route::post('/ajouter', [PersonneController::class, 'store'])->name('Formateur.store');
            Route::get('/{id}', [PersonneController::class, 'show'])->name('Formateur.show');
            Route::get('/{id}/edit', [PersonneController::class, 'edit'])->name('Formateur.edit');
            Route::post('/{id}/update', [PersonneController::class, 'update'])->name('Formateur.update');
            Route::delete('/{id}/delete', [PersonneController::class, 'destroy'])->name('Formateur.delete');
        });
});
