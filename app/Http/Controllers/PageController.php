<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {   

        $search = $request->search;
    
        //$posts = Post::get();//obtienes todo el Post

        /*. La consulta busca publicaciones (Post) cuyos títulos contengan la cadena de búsqueda proporcionada.
        La consulta se ordena por fecha de creación de manera descendente (últimas primero) y se paginan los resultados.*/
        $posts = Post::where('title', 'LIKE', "%{$search}%")
            ->with('user')// El siguiente bloque carga la relación 'user' junto con las publicaciones.
            ->latest()->paginate(); // muestra los ultimos post en paginacion
        

        // Retorna la vista llamada 'home'. // Retorna la vista 'blog' y pasa las publicaciones como datos
        return view('home', ['posts' => $posts]);
    }

    public function post(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}
