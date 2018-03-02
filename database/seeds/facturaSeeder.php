<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class facturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('factura')->insert(array(
            'empresa_id' 		=> '1',
            'sucursal_id' 		=> '1',
            'mes' 				=> 'diciembre',
        	'anio' 				=> '2017',
        	'fecha' 			=> date('2017-04-25'),
        	'hora' 				=> DateTime('2017-04-25 08:37:17', 'UTC'),
            'direccion' 		=> 'San Jose La maquina',
        	'total_factura' 	=> '200',
        	'estado' 			=> '1',
            'created_at' 		=> date('Y-m-d H:m:s'),
            'updated_at' 		=> date('Y-m-d H:m:s') 
        ));       
    }
}
