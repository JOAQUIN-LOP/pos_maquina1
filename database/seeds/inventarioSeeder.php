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
            'mes' 							=> 'diciembre',
        	'anio' 							=> '2017',
        	'fecha' 						=> '2017-04-25',
        	'total_cantidad_productos' 		=> '800',
        	'total_cantidad_inventario'		=> '200',
        	'estado' 						=> '1',
            'created_at' 					=> date('Y-m-d H:m:s'),
            'updated_at' 					=> date('Y-m-d H:m:s') 
        ));  
    }
}
