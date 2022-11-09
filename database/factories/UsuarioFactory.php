<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'=> fake()->name(),
            'email'=> fake()->safeEmail(),
            'edad'=> fake()->numberBetween(10,100),
            "password"=>Str::random(255),
           // "codigo_verficacion"=> Str::random(4)
        ];
    }
}
