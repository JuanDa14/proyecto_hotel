<?php

namespace Database\Seeders;

use App\Models\DetallePedido;
use Illuminate\Database\Seeder;

class DetallePedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetallePedido::factory(100)->create();
    }
}
