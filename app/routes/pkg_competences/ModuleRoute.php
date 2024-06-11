<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_competences\ModuleController;
use App\Models\pkg_competences\Module;

// routes for Module management
Route::middleware('auth')->group(function () {
    $namespace = 'App\Http\Controllers\pkg_competences';
    Route::namespace($namespace)->group(function () {
        Route::prefix('Module')->group(function () {
            Route::get('/', [ModuleController::class, 'index'])->name('Filiere.index');
            Route::get('/Module/form-ajouter', [ModuleController::class, 'create'])->name('Filiere.create');
            Route::post('/Module/ajouter', [ModuleController::class, 'store'])->name('Filiere.store');
            Route::get('/Module/{id}', [ModuleController::class, 'show'])->name('Filiere.show');
            Route::get('/Module/{id}/edit', [ModuleController::class, 'edit'])->name('Filiere.edit');
            Route::put('/Module/{id}/update', [ModuleController::class, 'update'])->name('Filiere.update');
            Route::delete('/Module/{id}/delete', [ModuleController::class, 'destroy'])->name('Filiere.delete');
            Route::get('/Module/export', [ModuleController::class, 'export'])->name('Filiere.export');
        Route::post('/Module/import', [ModuleController::class, 'import'])->name('Filiere.import');
        });
    });
});
