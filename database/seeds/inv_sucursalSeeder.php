<?php

use Illuminate\Database\Seeder;

class inv_sucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\inv_sucursal::class, 90)->create();
    }
}
