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
          'idProducto'              =>'1',
          'mes'                     =>'01',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-01-5',
          'precio_total_compras'    =>'51',
          'cantidad_unidades'       =>'10',
          'precio_unidad'           =>'5.10',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'2',
          'mes'                     =>'01',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-01-6',
          'precio_total_compras'    =>'147',
          'cantidad_unidades'       =>'50',
          'precio_unidad'           =>'2.94',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'3',
          'mes'                     =>'01',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-01-7',
          'precio_total_compras'    =>'165',
          'cantidad_unidades'       =>'24',
          'precio_unidad'           =>'6.88',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));        

        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'4',
          'mes'                     =>'02',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-02-9',
          'precio_total_compras'    =>'95',
          'cantidad_unidades'       =>'72',
          'precio_unidad'           =>'1.32',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'02',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-02-10',
          'precio_total_compras'    =>'118.80',
          'cantidad_unidades'       =>'12',
          'precio_unidad'           =>'9.90',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'02',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-02-11',
          'precio_total_compras'    =>'18',
          'cantidad_unidades'       =>'12',
          'precio_unidad'           =>'1.5',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'02',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-02-11',
          'precio_total_compras'    =>'118.80',
          'cantidad_unidades'       =>'24',
          'precio_unidad'           =>'63.60',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));
        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'02',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-02-11',
          'precio_total_compras'    =>'118.80',
          'cantidad_unidades'       =>'6',
          'precio_unidad'           =>'15.50',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));
        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'02',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-02-12',
          'precio_total_compras'    =>'118.80',
          'cantidad_unidades'       =>'12',
          'precio_unidad'           =>'3.30',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));
        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'02',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-02-13',
          'precio_total_compras'    =>'118.80',
          'cantidad_unidades'       =>'24',
          'precio_unidad'           =>'11.50',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));
        
        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'1',
          'mes'                     =>'03',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-03-2',
          'precio_total_compras'    =>'51',
          'cantidad_unidades'       =>'10',
          'precio_unidad'           =>'5.10',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'2',
          'mes'                     =>'03',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-03-4',
          'precio_total_compras'    =>'147',
          'cantidad_unidades'       =>'50',
          'precio_unidad'           =>'2.94',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'3',
          'mes'                     =>'03',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-03-7',
          'precio_total_compras'    =>'165',
          'cantidad_unidades'       =>'24',
          'precio_unidad'           =>'6.88',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));        

        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'4',
          'mes'                     =>'03',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-03-9',
          'precio_total_compras'    =>'95',
          'cantidad_unidades'       =>'72',
          'precio_unidad'           =>'1.32',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'04',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-04-10',
          'precio_total_compras'    =>'118.80',
          'cantidad_unidades'       =>'12',
          'precio_unidad'           =>'9.90',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'04',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-04-11',
          'precio_total_compras'    =>'118.80',
          'cantidad_unidades'       =>'12',
          'precio_unidad'           =>'9.90',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));

        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'04',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-04-11',
          'precio_total_compras'    =>'1526.40',
          'cantidad_unidades'       =>'24',
          'precio_unidad'           =>'63.60',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));
        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'04',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-04-11',
          'precio_total_compras'    =>'93',
          'cantidad_unidades'       =>'6',
          'precio_unidad'           =>'15.50',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));
        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'05',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-05-12',
          'precio_total_compras'    =>'39.60',
          'cantidad_unidades'       =>'12',
          'precio_unidad'           =>'3.30',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));
        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'05',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-05-13',
          'precio_total_compras'    =>'276',
          'cantidad_unidades'       =>'24',
          'precio_unidad'           =>'11.50',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));
        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'05',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-05-12',
          'precio_total_compras'    =>'813.60',
          'cantidad_unidades'       =>'18',
          'precio_unidad'           =>'45.20',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));
        DB::table('detalle_producto')->insert(array(
          'idProducto'              =>'5',
          'mes'                     =>'05',
          'anio'                    =>'2018',
          'fecha'                   =>'2018-05-13',
          'precio_total_compras'    =>'276',
          'cantidad_unidades'       =>'24',
          'precio_unidad'           =>'11.50',
          'estado'                  =>'1',
          'created_at'              => date('Y-m-d H:m:s'),
          'updated_at'              => date('Y-m-d H:m:s') 
        ));
    }
}
