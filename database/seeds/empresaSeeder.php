<?php

use Illuminate\Database\Seeder;

class empresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\empresa::class, 90)->create();
    }
}
