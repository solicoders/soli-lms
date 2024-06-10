<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_suivi\SuiviProjetController;

// Routes for project tracking management
Route::middleware('auth')->group(function () {
    Route::prefix('/suivi')->group(function () {
        Route::get('projets', [SuiviProjetController::class, 'index'])->name('suivi.projets');
    });
});


