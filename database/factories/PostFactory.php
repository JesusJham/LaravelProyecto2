<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            // Define el campo 'title' del modelo y asigna una oración ficticia generada por el faker.
            'title' => $title = $this->faker->sentence(),
            // Define el campo 'slug' del modelo utilizando un slug generado a partir del título.
            'slug' => Str::slug($title),
            // Define el campo 'body' del modelo y asigna un texto ficticio de aproximadamente 2200 caracteres generado por el faker.
            'body' => $this->faker->text(2200),
        ];
    }
}
