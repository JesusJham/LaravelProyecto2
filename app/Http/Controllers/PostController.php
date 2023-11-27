<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Método index: maneja la solicitud de mostrar una lista de recursos (publicaciones).
    public function index()
    {
        // Devuelve la vista 'posts.index', que se encargará de presentar la interfaz de usuario.
        return view('posts.index', [
            // Obtener las publicaciones ordenadas por fecha de creación de manera descendente y paginadas
            'posts' => Post::latest()->paginate()

        ]);
    }

    // Método para mostrar el formulario de creación de una nueva publicación
    public function create(Post $post)
    {
        // Carga la vista 'posts.create' y pasa la variable $post a la vista

        return view('posts.create', compact('post'));
    }

    // Método para mostrar el formulario de edición de una publicación existente
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }



    public function destroy(Post $post)
    {
        // Elimina la publicación de la base de datos
        $post->delete();

        // Redirige de nuevo a la página anterior
        return back();
    }
}
