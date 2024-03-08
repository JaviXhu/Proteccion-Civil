<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\CochesController;
use App\Http\Controllers\ObjetosController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas CRUD Usuario
Route::get('/registro', [UsuarioController::class, 'create'])->name('registro');
Route::post('/usuario', [UsuarioController::class, 'store'])->name('usuario.store');

// Ruta para mostrar el formulario de inicio de sesión
Route::get('/login', [UsuarioController::class, 'showLoginForm'])->name('usuario.login');
// Ruta para procesar el inicio de sesión
Route::post('/login', [UsuarioController::class, 'login'])->name('usuario.login.submit');
// Ruta para desloguearse
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

// Rutas para las actividades
Route::middleware('auth')->group(function () {
    Route::resource('actividades', ActividadController::class)->except(['create', 'edit']);
    Route::get('actividades/create', [ActividadController::class, 'create'])->name('actividades.create');
});

// Rutas para los coches, objetos y personal (solo para administradores)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('coches', CochesController::class)->parameters(['coches' => 'coche']);
    Route::resource('objetos', ObjetosController::class)->parameters(['objetos' => 'objeto']);
    Route::resource('personal', PersonalController::class);

    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('usuarios.admin.dashboard');
});



// Rutas para el panel de voluntarios
Route::middleware(['auth', 'voluntario'])->group(function () {
    Route::get('/voluntario/dashboard', [DashboardController::class, 'voluntario'])->name('usuarios.voluntario.dashboard');
});
