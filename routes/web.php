<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegionalesController;
use App\Http\Controllers\CentrodeformacionController;
use App\Http\Controllers\ProgramasdeformacionController;
use App\Http\Controllers\FichadecaracterizacionController;
use App\Http\Controllers\EpsController;
use App\Http\Controllers\TiposdocumentosController;
use App\Http\Controllers\RolesadministrativosController;
use App\Http\Controllers\InstructoresController;
use App\Http\Controllers\EntecoformadorController;
use App\Http\Controllers\AprendicesController;

// Ruta del dashboard con nombre 'dashboard'
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// También puedes mantener la ruta welcome si la necesitas
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Rutas de recursos
Route::resource('regionales', RegionalesController::class);
Route::resource('centros', CentrodeformacionController::class);
Route::resource('programas', ProgramasdeformacionController::class);
Route::resource('fichas', FichadecaracterizacionController::class);
Route::resource('eps', EpsController::class);
Route::resource('tiposdocumentos', TiposdocumentosController::class);
Route::resource('roles', RolesadministrativosController::class);
Route::resource('instructores', InstructoresController::class);
Route::resource('entes', EntecoformadorController::class);
Route::resource('aprendices', AprendicesController::class);
