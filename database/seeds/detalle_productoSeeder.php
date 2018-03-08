<?php

use Illuminate\Database\Seeder;

class detalle_productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalle_producto')->insert(array(
          'idProducto' =>	'1',
          'mes'         =>'01',
          'anio'        =>'2018',
          'fecha'       =>'2018-01-16',
          'precio_total_compras' => '51',
          'cantidad_unidades' => '10',
          'precio_unidad' => '5.10',
          'estado' => '1',
          'created_at' => date('Y-m-d H:m:s'),
          'updated_at' => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_producto')->insert(array(
          'idProducto' =>	'2',
          'mes'         =>'01',
          'anio'        =>'2018',
          'fecha'       =>'2018-01-18',
          'precio_total_compras' => '147',
          'cantidad_unidades' => '50',
          'precio_unidad' => '2.94',
          'estado' => '1',
          'created_at' => date('Y-m-d H:m:s'),
          'updated_at' => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_producto')->insert(array(
          'idProducto' =>	'3',
          'mes'         =>'02',
          'anio'        =>'2018',
          'fecha'       =>'2018-02-20',
          'precio_total_compras' => '165',
          'cantidad_unidades' => '24',
          'precio_unidad' => '6.88',
          'estado' => '1',
          'created_at' => date('Y-m-d H:m:s'),
          'updated_at' => date('Y-m-d H:m:s') 
        ));        

        DB::table('detalle_producto')->insert(array(
          'idProducto' =>	'4',
          'mes'         =>'03',
          'anio'        =>'2018',
          'fecha'       =>'2018-03-21',
          'precio_total_compras' => '95',
          'cantidad_unidades' => '72',
          'precio_unidad' => '1.32',
          'estado' => '1',
          'created_at' => date('Y-m-d H:m:s'),
          'updated_at' => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_producto')->insert(array(
          'idProducto' =>	'5',
          'mes'         =>'01',
          'anio'        =>'2018',
          'fecha'       =>'2018-01-25',
          'precio_total_compras' => '118.80',
          'cantidad_unidades' => '12',
          'precio_unidad' => '9.90',
          'estado' => '1',
          'created_at' => date('Y-m-d H:m:s'),
          'updated_at' => date('Y-m-d H:m:s') 
        ));
    }
}
