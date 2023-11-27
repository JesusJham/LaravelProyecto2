<?php

// Se utiliza el espacio de nombres y se importan las clases necesarias
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

// Grupo de rutas para usuarios invitados (guests)
Route::middleware('guest')->group(function () {
    // Ruta para mostrar el formulario de inicio de sesión
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

    // Ruta para procesar el formulario de inicio de sesión (POST)
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Grupo de rutas para usuarios autenticados (auth)
Route::middleware('auth')->group(function () {
    // Ruta para procesar la solicitud de cierre de sesión (POST)
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
