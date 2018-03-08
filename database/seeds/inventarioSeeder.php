<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class inventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventario')->insert(array(
            'num_inventario'                => '1',
            'idEmpresa' 					=> '1',
            'mes' 							=> '1',
        	'anio' 							=> '2018',
        	'fecha' 						=> '2018-01-28',
        	'total_cantidad_productos' 		=> '800.00',
        	'total_cantidad_inventario'		=> '200.00',
        	'estado' 						=> '1',
            'created_at' 					=> date('Y-m-d H:m:s'),
            'updated_at' 					=> date('Y-m-d H:m:s') 
        ));  
    }
}
