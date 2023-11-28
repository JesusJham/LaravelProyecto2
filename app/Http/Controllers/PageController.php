<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {   

        //$posts = Post::get();//obtienes todo el Post
        //$post = Post::first(); //primer elemnto
        //$post = Post::find(25); // los 25 primerois elementos
        $posts = Post::latest()->paginate(); // muestra los ultimos post en paginacion con 6 por p

        // Retorna la vista llamada 'home'. // Retorna la vista 'blog' y pasa las publicaciones como datos
        return view('home', ['posts' => $posts]);
    }

    public function post(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}
