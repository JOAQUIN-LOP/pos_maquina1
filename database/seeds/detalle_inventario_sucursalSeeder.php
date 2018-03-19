<?php

use Illuminate\Database\Seeder;

class detalle_inventario_sucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalle_inventario_sucursal')->insert(array(
            'idInventarioSucursal'		    => '1',
            'idProducto'                    => '1',
            'mes'                           => '02', 
            'anio'                          => '2018',  
            'fecha'                         => '2018-02-18',       
        	'cantidad_total'				=> '1000',
        	'subtotal_inventario' 			=> '8000',
            'created_at' 					=> date('Y-m-d H:m:s'),
            'updated_at' 					=> date('Y-m-d H:m:s') 
        )); 

        DB::table('detalle_inventario_sucursal')->insert(array(
            'idInventarioSucursal'          => '1',
            'idProducto'                    => '2',
            'mes'                           => '02', 
            'anio'                          => '2018',  
            'fecha'                         => '2018-02-18',       
            'cantidad_total'                => '600',
            'subtotal_inventario'           => '6000',
            'created_at'                    => date('Y-m-d H:m:s'),
            'updated_at'                    => date('Y-m-d H:m:s') 
        )); 

        DB::table('detalle_inventario_sucursal')->insert(array(
            'idInventarioSucursal'          => '1',
            'idProducto'                    => '3',
            'mes'                           => '02', 
            'anio'                          => '2018',  
            'fecha'                         => '2018-02-18',       
            'cantidad_total'                => '80',
            'subtotal_inventario'           => '800',
            'created_at'                    => date('Y-m-d H:m:s'),
            'updated_at'                    => date('Y-m-d H:m:s') 
        )); 

        DB::table('detalle_inventario_sucursal')->insert(array(
            'idInventarioSucursal'          => '1',
            'idProducto'                    => '4',
            'mes'                           => '02', 
            'anio'                          => '2018',  
            'fecha'                         => '2018-02-18',       
            'cantidad_total'                => '530',
            'subtotal_inventario'           => '5300',
            'created_at'                    => date('Y-m-d H:m:s'),
            'updated_at'                    => date('Y-m-d H:m:s') 
        )); 
    }
}
