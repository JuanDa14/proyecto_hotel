<?php

namespace Database\Seeders;

use App\Models\DetalleReserva;
use Illuminate\Database\Seeder;

class DetalleReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetalleReserva::factory(300)->create();
    }
}
