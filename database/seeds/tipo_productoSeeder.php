<?php

use Illuminate\Database\Seeder;

class tipo_productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\tipo_producto::class, 90)->create();
    }
}
