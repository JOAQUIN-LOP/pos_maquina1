<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class detalle_facturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalle_factura')->insert(array(
        	'idFactura'    		=>	'1',
            'idProducto'        =>  '1',
            'cantidad' 			=>  '2',
            'precio_unit'		=>  '11.80',
        	'total_venta' 		=>  '23.60',
            'created_at' 		=>  date('Y-m-d H:m:s'),
            'updated_at'		=>  date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_factura')->insert(array(
            'idFactura'         =>  '1',
            'idProducto'        =>  '2',
            'cantidad'          =>  '20',
            'precio_unit'       =>  '2.5',
            'total_venta'       =>  '50',
            'created_at'        =>  date('Y-m-d H:m:s'),
            'updated_at'        =>  date('Y-m-d H:m:s') 
        )); 

        DB::table('detalle_factura')->insert(array(
            'idFactura'         =>  '1',
            'idProducto'        =>  '3',
            'cantidad'          =>  '45',
            'precio_unit'       =>  '8.5',
            'total_venta'       =>  '382.50',
            'created_at'        =>  date('Y-m-d H:m:s'),
            'updated_at'        =>  date('Y-m-d H:m:s') 
        )); 
    }
}
