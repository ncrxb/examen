<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
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
            'precio'=> fake()->numberBetween(1,100),
            'cantidad'=> fake()->numberBetween(10,100),
            'descripcion'=> fake()->text()
        ];
    }
}
