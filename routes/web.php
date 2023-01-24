<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\HoraController;
use App\Http\Controllers\HorarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
    Route::get('/asignaturas', [AsignaturaController::class, 'index'])->name('asignaturas');
    Route::get('/asignaturas/crear', [AsignaturaController::class, 'create'])->name('asignaturas');
    Route::post('/asignaturas/crear', [AsignaturaController::class, 'store'])->name('asignaturas');
    Route::get('/asignaturas/ver/{id}', [AsignaturaController::class, 'show'])->name('asignaturas');
    Route::get('/asignaturas/editar/{id}', [AsignaturaController::class, 'edit'])->name('asignaturas');
    Route::post('/asignaturas/editar/{id}', [AsignaturaController::class, 'update'])->name('asignaturas');
    Route::get('/asignaturas/eliminar/{id}', [AsignaturaController::class, 'destroy'])->name('asignaturas');
    Route::get('/horario', [HorarioController::class, 'index'])->name('horario');
    Route::get('/horas/crear', [HoraController::class, 'create'])->name('horario');
    Route::post('/horas/crear', [HoraController::class, 'store'])->name('horario');
    Route::get('/horas/eliminar/{id}', [HoraController::class, 'destroy'])->name('horario');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
