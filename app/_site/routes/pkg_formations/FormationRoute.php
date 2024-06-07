<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_formations\FormationController;

Route::prefix('formations')->middleware('web')->group(function () {
    Route::get('/', [FormationController::class, 'index'])->name('formations.index')->middleware('permission:view formation');
    Route::get('/show/{id}', [FormationController::class, 'show'])->name('formations.show')->middleware('permission:view formation');
    Route::get('/edit/{id}', [FormationController::class, 'edit'])->name('formations.edit')->middleware('permission:edit formation');
    Route::get('/create', [FormationController::class, 'create'])->name('formations.create')->middleware('permission:add formation');
    Route::post('/store', [FormationController::class, 'store'])->name('formations.store')->middleware('permission:add formation');
    Route::put('/update/{id}', [FormationController::class, 'update'])->name('formations.update')->middleware('permission:edit formation');
    Route::delete('/destroy/{id}', [FormationController::class, 'destroy'])->name('formations.destroy')->middleware('permission:delete formation');
    Route::get('/export', [FormationController::class, 'export'])->name('formations.export')->middleware('permission:export formation');
    Route::post('/import', [FormationController::class, 'import'])->name('formations.import')->middleware('permission:import formation');
});


