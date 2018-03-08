<?php

use Illuminate\Database\Seeder;

class detalle_inventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalle_inventario')->insert(array(
            'idInventario'		             => '1',
            'idProducto'                     => '1',
            'mes'                            => '01',
            'anio'                           => '2018',
            'fecha'                          => '2018-01-28',
        	'cantidad_total'		         => '1000',
        	'subtotal_inventario' 		     => '8000',
            'created_at' 			         => date('Y-m-d H:m:s'),
            'updated_at' 			         => date('Y-m-d H:m:s') 
        )); 
    }
}