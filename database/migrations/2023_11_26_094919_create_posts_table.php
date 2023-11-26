<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            // Crea un campo 'id' autoincremental como clave primaria.
            $table->id();

            // Crea un campo 'user_id' que será utilizado como clave foránea.
            $table->unsignedBigInteger('user_id'); //de migrations/users
            // Define una restricción de clave foránea en el campo 'user_id'.
            // Esta clave foránea referencia la columna 'id' en la tabla 'users'.
            $table->foreign('user_id')->references('id')->on('users');

            $table->string("title"); //Crear columna "title"
            $table->string("slug")->unique(); //Crear columna ->unique
            $table->text("body"); //Crear columna "body"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
