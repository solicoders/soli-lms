<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_formations\FormationController;

Route::prefix('formations')->group(function () {
    Route::post('/', [FormationController::class, 'store'])->name('formations.store');
    Route::put('/{id}', [FormationController::class, 'update'])->name('formations.update');
    Route::delete('/{id}', [FormationController::class, 'destroy'])->name('formations.destroy');
});
