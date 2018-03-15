<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class tipo_productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tipo_producto')->insert(array(

          		'tipoProducto'    =>   ' ',
          		'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s') 

          ));
    }
}
