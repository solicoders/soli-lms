<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_competences\NiveauCompetenceController;
use App\Models\pkg_competences\NiveauCompetence;

// routes for Module management
Route::middleware('auth')->group(function () {
    $namespace = 'App\Http\Controllers\pkg_competences';
    Route::namespace($namespace)->group(function () {
        Route::prefix('NiveauCompetence')->group(function () {
            Route::get('/', [NiveauCompetenceController::class, 'index'])->name('Filiere.index');
            Route::get('/NiveauCompetence/form-ajouter', [NiveauCompetenceController::class, 'create'])->name('Filiere.create');
            Route::post('/NiveauCompetence/ajouter', [NiveauCompetenceController::class, 'store'])->name('Filiere.store');
            Route::get('/NiveauCompetence/{id}', [NiveauCompetenceController::class, 'show'])->name('Filiere.show');
            Route::get('/NiveauCompetence/{id}/edit', [NiveauCompetenceController::class, 'edit'])->name('Filiere.edit');
            Route::put('/NiveauCompetence/{id}/update', [NiveauCompetenceController::class, 'update'])->name('Filiere.update');
            Route::delete('/NiveauCompetence/{id}/delete', [NiveauCompetenceController::class, 'destroy'])->name('Filiere.delete');
            Route::get('/NiveauCompetence/export', [NiveauCompetenceController::class, 'export'])->name('Filiere.export');
        Route::post('/NiveauCompetence/import', [NiveauCompetenceController::class, 'import'])->name('Filiere.import');
        });
    });
});
