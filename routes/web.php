<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;


// Paso 1: Definir un grupo de rutas para el controlador PageController
Route::controller(PageController::class)->group(function () {
    // Paso 2: Ruta para la página de inicio ("/")
    Route::get('/', 'home')->name('home');
    // Paso 3: Ruta para la página del blog ("/blog")
    Route::get('blog', 'blog')->name('blog');
    // Paso 4: Ruta para ver una publicación específica del blog ("/blog/{post:slug}")
    // Utiliza un parámetro dinámico llamado "slug" para identificar la publicación
    Route::get('blog/{post:slug}', 'post')->name('post'); //
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
