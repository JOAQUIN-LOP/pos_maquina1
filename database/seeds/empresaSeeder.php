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
          DB::table('empresa')->insert([


          		'nom_empresa' => 'Tienda Maldonado',
          		'direccion' => 'San Jose La Maquina',

          ]);
    }
}
