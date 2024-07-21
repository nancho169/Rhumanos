<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\OrganigramaController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\NovedadesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/personas', [PersonasController::class, 'index'])
    ->name('personas.index')
    ->middleware(['auth', 'verified']);

Route::get('/personas/padron', [PersonasController::class, 'padron'])
    ->name('padron')
    ->middleware(['auth', 'verified']);

Route::get('/organigramas/listado/', [OrganigramaController::class, 'listado'])
    ->name('areas')
    ->middleware(['auth', 'verified']);

Route::get('/justificaciones/listado/', [OrganigramaController::class, 'listado'])
    ->name('justificaciones')
    ->middleware(['auth', 'verified']);



//EXPOTAR EXCEL


Route::get('/relog', [ExcelController::class, 'relog'])
    ->name('relog')
    ->middleware(['auth', 'verified']);

Route::get('/relog/migra_archivo', [ExcelController::class, 'uploadExcel'])
    ->name('uploadExcel')
    ->middleware(['auth', 'verified']);

Route::get('/novedades/index', [NovedadesController::class, 'index'])
    ->name('buscar')
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
