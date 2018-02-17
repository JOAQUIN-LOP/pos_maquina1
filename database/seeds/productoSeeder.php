<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\producto::class, 90)->create();
    }
}
