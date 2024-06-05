<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_realisation_projets\ProjectRealisationController;

// Routes for project realisation management
Route::middleware('auth')->group(function () {
    Route::resource('realisationProjets', ProjectRealisationController::class);
});
