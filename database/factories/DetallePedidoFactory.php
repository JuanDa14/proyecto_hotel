<?php

namespace Database\Factories;

use App\Models\DetallePedido;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class DetallePedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = DetallePedido::class;

    public function definition()
    {
        return [
            'cantidad' => $this->faker->randomDigitNotNull(),
            'precio' => $this->faker->randomFloat(2, 0, 1000),
            'idpedido' => $this->faker->randomElement(DB::table('pedidos')->pluck('id')->toArray()),
            'idproducto' => $this->faker->randomElement(DB::table('productos')->pluck('id')->toArray()),
        ];
    }
}
