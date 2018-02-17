<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class facturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\factura::class, 90)->create();
    }
}
