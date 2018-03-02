<?php

use Illuminate\Database\Seeder;

class tabla_calculo_sucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tabla_calculo')->insert(array(
            'idProducto'			=> '1',
            'cantidad_bodega' 		=> '20',
        	'descripcion_producto'	=> 'productos varios',
        	'precio_unitario' 		=> '11.80',
        	'subtotal' 				=> '236',
        	'fecha_transaccion' 	=> '2017-04-25',
            'created_at' 			=> date('Y-m-d H:m:s'),
            'updated_at' 			=> date('Y-m-d H:m:s') 
        )); 
    }
}
