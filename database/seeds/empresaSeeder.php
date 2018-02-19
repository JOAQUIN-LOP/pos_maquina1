<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Empresa;

class empresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(Empresa::class, 90)->create();
    }
}
