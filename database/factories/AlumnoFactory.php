<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_alumno'=> fake()->name(),
            'programa_educativo'=> fake()->safeEmail(),
            'calificacion'=> fake()->numberBetween(10,100),
            //"password"=>Str::random(255)
        ];
    }
}
