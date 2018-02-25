<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class sucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\sucursal::class, 90)->create();
    }
}
