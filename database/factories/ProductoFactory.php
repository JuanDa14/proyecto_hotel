<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Producto::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->text(10),
            'descripcion' => $this->faker->text(20),
            'estado' => $this->faker->randomElement(['ACTIVO', 'INACTIVO']),
            'precio' => $this->faker->randomFloat(2,3,300)
        ];
    }
}
