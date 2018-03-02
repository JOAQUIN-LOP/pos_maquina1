<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class inv_sucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventario_sucursal')->insert(array(
            'sucursal_id' 					=> '1',
            'mes' 							=> 'diciembre',
        	'anio' 							=> '2017',
        	'fecha' 						=> '2017-04-25',
        	'total_cantidad_productos' 		=> '900',
        	'total_cantidad_inventario'		=> '1000',
        	'estado' 						=> '1',
            'created_at' 					=> date('Y-m-d H:m:s'),
            'updated_at' 					=> date('Y-m-d H:m:s') 
        ));  
    }
}
