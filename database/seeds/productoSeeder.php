<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('producto')->insert(array(

          		'codProducto' 				=> '0001',
          		'nomProducto' 				=> 'Maseca Mexicana',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '0002',
          		'nomProducto' 				=> 'Mosh a granel',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(

          		'codProducto' 				=> '0003',
          		'nomProducto' 				=> 'Maiz del monte',
          		'descripcion_producto'		=> '15 onz.',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '0004',
          		'nomProducto' 				=> 'Azistin',
          		'descripcion_producto'		=> 'Sobre',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(

          		'codProducto' 				=> '0005',
          		'nomProducto' 				=> 'Azistin',
          		'descripcion_producto'		=> 'Litro',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '0006',
          		'nomProducto' 				=> 'Avena Molida Quaker',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(

          		'codProducto' 				=> '0007',
          		'nomProducto' 				=> 'Avena Sobresito',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '0008',
          		'nomProducto' 				=> 'Angelitos Pequeños',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(

          		'codProducto' 				=> '0009',
          		'nomProducto' 				=> 'Angelitos Grandes',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '00010',
          		'nomProducto' 				=> 'Aceite Ideal',
          		'descripcion_producto'		=> 'Galon',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(

          		'codProducto' 				=> '00011',
          		'nomProducto' 				=> 'Aceite Ideal',
          		'descripcion_producto'		=> 'Medio Galon',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '00012',
          		'nomProducto' 				=> 'Aceite Ideal',
          		'descripcion_producto'		=> '1000 ml',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '00013',
          		'nomProducto' 				=> 'Aceite Idealito',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '00014',
          		'nomProducto' 				=> 'Suavitel',
          		'descripcion_producto'		=> 'Bote 850 ml',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '00015',
          		'nomProducto' 				=> 'Shampoo Blues baby',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '00016',
          		'nomProducto' 				=> 'Shampoo adios piojos',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(

          		'codProducto' 				=> '00017',
          		'nomProducto' 				=> 'Saca basura de plastico',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '00018',
          		'nomProducto' 				=> 'Sardina tentacion',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '00019',
          		'nomProducto' 				=> 'Sellador',
          		'descripcion_producto'		=> '40 yardas',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '00020',
          		'nomProducto' 				=> 'Azucar Mexicana',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '00021',
          		'nomProducto' 				=> 'Melocoton morena',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(

          		'codProducto' 				=> '00022',
          		'nomProducto' 				=> 'Menta best',
          		'descripcion_producto'		=> '-',
          		'estado' 					=> '1',
          		'tipo_id'					=> '1',
       			'created_at' 				=> date('Y-m-d H:m:s'),
        		'updated_at' 				=> date('Y-m-d H:m:s')
          ));
    }
}
