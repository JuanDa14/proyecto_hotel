<?php

namespace Database\Factories;

use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ReservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * 
     */

    protected $model = Reserva::class;



    public function definition()
    {
        return [
            'fecha' => $this->faker->date($format = 'Y-m-d', $max = 'now', $min = '2022-01-01'),
            'estado' => $this->faker->randomElement(['VALIDA', 'CANCELADA']),
            'idcliente' => $this->faker->randomElement(DB::table('cliente')->pluck('id')),
            'idtipopago' => $this->faker->randomElement(['1', '2']),
            'iduser' => $this->faker->randomElement(
                DB::table('users')
                    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->where('model_has_roles.role_id', '=', '2')
                    ->pluck('users.id')

            ),
        ];
    }
}
