<?php

use Illuminate\Database\Seeder;

class detalle_facturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\detalle_factura::class, 90)->create();
    }
}
