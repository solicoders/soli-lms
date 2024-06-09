<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_suivi\SuiviProjetController;


// Routes for validation management
Route::middleware('auth')->group(function () {
    Route::prefix('/suivi')->group(function () {
        Route::get('suiviProjets', [SuiviProjetController::class, 'index']);
    });
});