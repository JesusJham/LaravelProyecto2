<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     * Estos atributos pueden ser asignados en una operación de asignación en masa
     * como al utilizar los métodos create o update de Eloquent.
     */
    protected $fillable = [
        'title', // Título de la publicación
        'slug',  // Slug generado a partir del título
        'body',  // Contenido o cuerpo de la publicación
    ];


    public function user()
    {
        //una publicacion pertenece a un unico usuario
        return $this->belongsTo(User::class);
    }
}
