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
            'mes'                            => '02',
            'anio'                           => '2018',
            'fecha'                          => '2018-02-28',
        	'cant_total'		             => '80.00',
        	'subtotal_inventario' 		     => '800.00',
            'created_at' 			         => date('Y-m-d H:m:s'),
            'updated_at' 			         => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_inventario')->insert(array(
            
            'idInventario'                   => '1',
            'idProducto'                     => '1',
            'mes'                            => '02',
            'anio'                           => '2018',
            'fecha'                          => '2018-02-28',
            'cant_total'                     => '70.00',
            'subtotal_inventario'            => '700.00',
            'created_at'                     => date('Y-m-d H:m:s'),
            'updated_at'                     => date('Y-m-d H:m:s') 
        )); 

        DB::table('detalle_inventario')->insert(array(
            
            'idInventario'                   => '1',
            'idProducto'                     => '2',
            'mes'                            => '02',
            'anio'                           => '2018',
            'fecha'                          => '2018-02-28',
            'cant_total'                     => '60.00',
            'subtotal_inventario'            => '600.00',
            'created_at'                     => date('Y-m-d H:m:s'),
            'updated_at'                     => date('Y-m-d H:m:s') 
        )); 

        DB::table('detalle_inventario')->insert(array(
            
            'idInventario'                   => '1',
            'idProducto'                     => '1',
            'mes'                            => '02',
            'anio'                           => '2018',
            'fecha'                          => '2018-02-28',
            'cant_total'                     => '200.00',
            'subtotal_inventario'            => '2000.00',
            'created_at'                     => date('Y-m-d H:m:s'),
            'updated_at'                     => date('Y-m-d H:m:s') 
        )); 
    }
}