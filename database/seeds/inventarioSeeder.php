<?php

use Illuminate\Database\Seeder;

class inventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\inventario::class, 90)->create();
    }
}
