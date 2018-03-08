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
            'num_factura'       => '1',
            'idEmpresa' 		=> '1',
            'idSucursal' 		=> '1',
            'idUsuario'         => '1',
            'dia'               => '28',
            'mes' 				=> '02',
        	'anio' 				=> '2018',
        	'fecha' 			=> '2018-02-28',
        	'hora' 				=> '2018-02-28 08:37:17',
            'direccion' 		=> 'San Jose La maquina',
        	'total_factura' 	=> '200',
        	'estado' 			=> '1',
            'created_at' 		=> date('Y-m-d H:m:s'),
            'updated_at' 		=> date('Y-m-d H:m:s') 
        ));       
    }
}
