<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // Retorna la vista llamada 'home'.
        return view('home');
    }

    public function blog()
    {
        $posts = Post::get();//obtienes todo el Post
        //$post = Post::first(); //primer elemnto
        //$post = Post::find(25); // los 25 primerois elementos

        //muestra los elementos de la variable y finaliza la ejecución del script:
        //dd($post);
        //$posts = Post::latest()->paginate(6); // muestra los ultimos post en paginacion con 6 por p
        

            // Retorna la vista 'blog' y pasa las publicaciones como datos
        return view('blog', ['posts' => $posts]);
    }

    public function post(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}
