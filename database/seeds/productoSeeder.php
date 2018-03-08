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
              'tipo_id'                 => '1',
          		'codProducto' 				    => ' ',
          		'nomProducto' 				    => 'Maseca Mexicana',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 				      => date('Y-m-d H:m:s'),
        		  'updated_at' 				      => date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 				    => 'Mosh a granel',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 				      => date('Y-m-d H:m:s'),
        		  'updated_at' 				      => date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 			     	=> 'Maiz del monte',
          		'descripcion_producto'		=> '15 onz.',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 			     	=> 'Azistin Sobre',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 		       		=> date('Y-m-d H:m:s'),
        		  'updated_at' 			       	=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 				    => 'Azistin Litro',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        	   	'updated_at' 			       	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 			     	=> 'Avena Molida Quaker',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 				      => date('Y-m-d H:m:s'),
        		  'updated_at' 				      => date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 			     	=> 'Avena Sobresito',
          		'descripcion_producto'	  => '-',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 			     	=> 'Angelitos Pequeños',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 				    => 'Angelitos Grandes',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 				      => date('Y-m-d H:m:s'),
        		  'updated_at' 				      => date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 				    => 'Aceite Ideal Galon',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 			     	=> 'Aceite Ideal Medio Galon',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 			     	=> 'Aceite Ideal',
          		'descripcion_producto'		=> '1000 ml',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 			     	=> 'Aceite Idealito',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 		       		=> date('Y-m-d H:m:s'),
        		  'updated_at' 		       		=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 		    		=> 'Suavitel',
          		'descripcion_producto'		=> 'Bote 850 ml',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 			     	=> 'Shampoo Blues baby',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 	      			=> date('Y-m-d H:m:s'),
        		  'updated_at' 	      			=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 		    		=> 'Shampoo adios piojos',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 			     	=> 'Saca basura de plastico',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 	      			=> date('Y-m-d H:m:s'),
        		  'updated_at' 	      			=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 			     	=> 'Sardina tentacion',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 		       		=> date('Y-m-d H:m:s'),
        		  'updated_at' 		       		=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 			     	=> 'Sellador',
          		'descripcion_producto'		=> '40 yardas',
          		'estado' 				         	=> '1',
       			  'created_at' 		       		=> date('Y-m-d H:m:s'),
        		  'updated_at' 		       		=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 		     		=> 'Azucar Mexicana',
          		'descripcion_producto'		=> '-',
          		'estado' 			        		=> '1',
       			  'created_at' 		       		=> date('Y-m-d H:m:s'),
        		  'updated_at' 		       		=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 		     		=> 'Melocoton morena',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => '1',
              'codProducto'             => ' ',
          		'nomProducto' 			     	=> 'Menta best',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 		       		=> date('Y-m-d H:m:s'),
        		  'updated_at' 		       		=> date('Y-m-d H:m:s')
          ));
    }
}
