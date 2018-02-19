<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Usuario::class, 90)->create();
    }
}
