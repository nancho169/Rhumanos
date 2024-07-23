<?php

use App\Http\Controllers\JustificacionesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\OrganigramaController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\NovedadesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//INICIO DE APLICACIÓN
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//PERFIL
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//PERSONAS
Route::get('/personas', [PersonasController::class, 'index'])
    ->name('personas.index')
    ->middleware(['auth', 'verified']);

Route::get('/personas/padron', [PersonasController::class, 'padron'])
    ->name('padron')
    ->middleware(['auth', 'verified']);
    //llamada Ajax 
Route::get('/personas', [PersonasController::class, 'dni'])
    ->name('dni')
    ->middleware(['auth', 'verified']);

//ORGANIGRAMA
Route::get('/organigramas/listado/', [OrganigramaController::class, 'listado'])
    ->name('areas')
    ->middleware(['auth', 'verified']);

//JUSTIFICACIONES
Route::get('/justificaciones/listado/', [JustificacionesController::class, 'listado'])
    ->name('justificaciones')
    ->middleware(['auth', 'verified']);
    //llamada Ajax 
Route::get('/justificaciones', [JustificacionesController::class, 'justificacion'])
    ->name('justificacion')
    ->middleware(['auth', 'verified']);
 
Route::post('/novedades/store', [NovedadesController::class, 'store'])
    ->name('novedades.store')
    ->middleware(['auth', 'verified']);


//EXPOTAR EXCEL
Route::get('/relog', [ExcelController::class, 'relog'])
    ->name('relog')
    ->middleware(['auth', 'verified']);

Route::post('/relog/migra_archivo', [ExcelController::class, 'uploadExcel'])
    ->name('uploadExcel')
    ->middleware(['auth', 'verified']);

//NOVEDADES
Route::get('/novedades/index', [NovedadesController::class, 'index'])
    ->name('buscar')
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
