<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    //El objeto $request encapsula estos datos y facilita su acceso en el controlador.
    public function store(Request $request)
    {
        // Obtiene el usuario autenticado a través del objeto $request
        $post = $request->user()->posts()->create([
            // Asigna el valor del campo 'title' y lo almacena en la variable $title
            'title' => $title = $request->title,
            // Genera un slug a partir del valor del campo 'title' utilizando Str::slug
            'slug' => Str::slug($title),
            // Asigna el valor del campo 'body'
            'body' => $request->body,
        ]);
        // Redirige a la página de edición de la nueva publicación
        return redirect()->route('posts.edit', $post);
    }


    // Método para mostrar el formulario de edición de una publicación existente
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    //Este método maneja la solicitud para actualizar una publicación.
    public function update(Request $request, Post $post)
    {
        /*Recibe dos parámetros: $request, que es un objeto de la clase Request que contiene los datos del formulario enviado, 
        y $post, que es una instancia del modelo Post que se actualizará.*/
        // Actualiza los atributos de la publicación con los datos del formulario
        $post->update([
            'title' => $title = $request->title,
            'slug' => Str::slug($title),
            'body' => $request->body,
        ]);

        // Redirige a la página de edición de la publicación actualizada
        return redirect()->route('posts.edit', $post);
    }


    public function destroy(Post $post)
    {
        // Elimina la publicación de la base de datos
        $post->delete();

        // Redirige de nuevo a la página anterior
        return back();
    }
}
