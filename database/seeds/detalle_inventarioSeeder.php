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
            'num_inventario'		=> '1',
            'id_calculo' 			=> '1',
        	'cantidad_total'		=> '1000',
        	'total_inventario' 		=> '8000',
        	'fecha' 				=> '2017-04-25',
            'created_at' 			=> date('Y-m-d H:m:s'),
            'updated_at' 			=> date('Y-m-d H:m:s') 
        )); 
    }
}
