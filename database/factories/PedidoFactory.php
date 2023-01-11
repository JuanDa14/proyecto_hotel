<?php

namespace Database\Factories;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Pedido::class;

    public function definition()
    {
        return [
            'idproveedor' => $this->faker->randomElement(DB::table('proveedor')->pluck('id')->toArray()),
            'iduser' => $this->faker->randomElement(DB::table('users')->pluck('id')->toArray()),
            'fechapedido' => $this->faker->dateTime(),
            'fechaentrega' => $this->faker->dateTime(),
            'total' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
