<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Cliente::class;
    public function definition()
    {
        return [
            'dni' => $this->faker->unique()->randomNumber($nbDigits = 8, $strict = false),
            'nombres' => $this->faker->name() . ' ' . $this->faker->lastName(),
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->unique()->randomNumber($nbDigits = 9, $strict = false),
            'genero' => $this->faker->randomElement(['M', 'F']),
        ];
    }
}
