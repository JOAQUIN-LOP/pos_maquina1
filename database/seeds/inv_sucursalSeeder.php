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
            'num_inventario_sucursal'       => '1',
            'idSucursal' 					=> '1',
            'mes' 							=> '2',
        	'anio' 							=> '2018',
        	'fecha' 						=> '2018-02-18',
        	'total_cantidad_productos' 		=> '900',
        	'total_cantidad_inventario'		=> '1000',
        	'estado' 						=> '1',
            'created_at' 					=> date('Y-m-d H:m:s'),
            'updated_at' 					=> date('Y-m-d H:m:s') 
        ));  
    }
}
