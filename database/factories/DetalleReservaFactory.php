<?php

namespace Database\Factories;

use App\Models\DetalleReserva;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class DetalleReservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected  $model  = DetalleReserva::class;


    // 'cantidad' => $this->faker->randomDigitNotNull(),
    // 'precio' => $this->faker->randomElement(
    //     DB::table('habitaciones')
    //         ->join('tipo_habitaciones', 'habitaciones.tipoHabitacion_id', '=', 'tipo_habitaciones.id')
    //         ->join('detalle_reserva', 'habitaciones.id', '=', 'detalle_reserva.idhabitacion')
    //         ->where('detalle_reserva.idreserva', '=', 'reserva.id')
    //         ->pluck('tipo_habitaciones.precio')
    // ),
    // 'importe' => $this->faker->randomElement(
    //     DB::table('reserva')
    //         ->join('detalle_reserva', 'reserva.id', '=', 'detalle_reserva.idreserva')
    //         ->join('hacitaciones', 'detalle_reserva.idhabitacion', '=', 'habitaciones.id')
    //         ->join('tipo_habitaciones', 'habitaciones.tipoHabitacion_id', '=', 'tipo_habitaciones.id')
    //         ->where('detalle_reserva.idreserva', '=', 'reserva.id')

    //         ->pluck('tipo_habitaciones.precio')
    // ),
    // 'idhabitacion' => $this->faker->randomElement(DB::table('habitaciones')->pluck('id')),
    // 'idreserva' => $this->faker->randomElement(DB::table('reserva')->pluck('id')),

    public function definition()
    {
        return [
            'cantidad' => $this->faker->randomDigitNotNull(),
            'precio' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'importe' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'idhabitacion' => $this->faker->randomElement(DB::table('habitaciones')->pluck('id')),
            'idreserva' => $this->faker->randomElement(DB::table('reserva')->pluck('id')),

        ];
    }
}
