<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;


// Paso 1: Definir un grupo de rutas para el controlador PageController
Route::controller(PageController::class)->group(function () {
    // Paso 2: Ruta para la página de inicio ("/")
    Route::get('/', 'home')->name('home');
    // Paso 4: Ruta para ver una publicación específica del blog ("/blog/{post:slug}")
    // Utiliza un parámetro dinámico llamado "slug" para identificar la publicación
    Route::get('blog/{post:slug}', 'post')->name('post'); //
});

// Define una ruta GET para la URL '/dashboard'
Route::get('/dashboard', function () {
    // Devuelve la vista 'dashboard'
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
// Aplica un middleware de autenticación a esta ruta. Esto significa que solo los usuarios autenticados podrán acceder a esta URL. 
//Si un usuario no está autenticado, será redirigido al proceso de inicio de sesión.


// Define rutas de recursos para el controlador PostController, excluyendo la ruta 'show' (mostrar detalles)
Route::resource('posts', PostController::class)->except('show');


require __DIR__.'/auth.php';
