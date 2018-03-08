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
              'tipo_id'                 => ' ',
          		'codProducto' 				    => ' ',
          		'nomProducto' 				    => 'Maseca Mexicana',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 				      => date('Y-m-d H:m:s'),
        		  'updated_at' 				      => date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 				    => ' ',
          		'nomProducto' 				    => 'Mosh a granel',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 				      => date('Y-m-d H:m:s'),
        		  'updated_at' 				      => date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 				    => ' ',
          		'nomProducto' 			     	=> 'Maiz del monte',
          		'descripcion_producto'		=> '15 onz.',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 			     	=> ' ',
          		'nomProducto' 			     	=> 'Azistin',
          		'descripcion_producto'		=> 'Sobre',
          		'estado' 					        => '1',
       			  'created_at' 		       		=> date('Y-m-d H:m:s'),
        		  'updated_at' 			       	=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 				    => ' ',
          		'nomProducto' 				    => 'Azistin',
          		'descripcion_producto'		=> 'Litro',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        	   	'updated_at' 			       	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 			     	=> ' ',
          		'nomProducto' 			     	=> 'Avena Molida Quaker',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 				      => date('Y-m-d H:m:s'),
        		  'updated_at' 				      => date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 			     	=> ' ',
          		'nomProducto' 			     	=> 'Avena Sobresito',
          		'descripcion_producto'	  => '-',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 			     	=> ' ',
          		'nomProducto' 			     	=> 'Angelitos Pequeños',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 				    => ' ',
          		'nomProducto' 				    => 'Angelitos Grandes',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 				      => date('Y-m-d H:m:s'),
        		  'updated_at' 				      => date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 				    => ' ',
          		'nomProducto' 				    => 'Aceite Ideal',
          		'descripcion_producto'		=> 'Galon',
          		'estado' 				         	=> '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 			     	=> ' ',
          		'nomProducto' 			     	=> 'Aceite Ideal',
          		'descripcion_producto'		=> 'Medio Galon',
          		'estado' 				         	=> '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 			     	=> ' ',
          		'nomProducto' 			     	=> 'Aceite Ideal',
          		'descripcion_producto'		=> '1000 ml',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 			     	=> ' ',
          		'nomProducto' 			     	=> 'Aceite Idealito',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 		       		=> date('Y-m-d H:m:s'),
        		  'updated_at' 		       		=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 		    		=> ' ',
          		'nomProducto' 		    		=> 'Suavitel',
          		'descripcion_producto'		=> 'Bote 850 ml',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 			     	=> ' ',
          		'nomProducto' 			     	=> 'Shampoo Blues baby',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 	      			=> date('Y-m-d H:m:s'),
        		  'updated_at' 	      			=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 		    		=> ' ',
          		'nomProducto' 		    		=> 'Shampoo adios piojos',
          		'descripcion_producto'		=> '-',
          		'estado' 					        => '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));
          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 			     	=> ' ',
          		'nomProducto' 			     	=> 'Saca basura de plastico',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 	      			=> date('Y-m-d H:m:s'),
        		  'updated_at' 	      			=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 			     	=> ' ',
          		'nomProducto' 			     	=> 'Sardina tentacion',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 		       		=> date('Y-m-d H:m:s'),
        		  'updated_at' 		       		=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 			     	=> ' ',
          		'nomProducto' 			     	=> 'Sellador',
          		'descripcion_producto'		=> '40 yardas',
          		'estado' 				         	=> '1',
       			  'created_at' 		       		=> date('Y-m-d H:m:s'),
        		  'updated_at' 		       		=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 		     		=> ' ',
          		'nomProducto' 		     		=> 'Azucar Mexicana',
          		'descripcion_producto'		=> '-',
          		'estado' 			        		=> '1',
       			  'created_at' 		       		=> date('Y-m-d H:m:s'),
        		  'updated_at' 		       		=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 		     		=> ' ',
          		'nomProducto' 		     		=> 'Melocoton morena',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 			      	=> date('Y-m-d H:m:s'),
        		  'updated_at' 			      	=> date('Y-m-d H:m:s')
          ));

          DB::table('producto')->insert(array(
              'tipo_id'                 => ' ',
          		'codProducto' 			     	=> ' ',
          		'nomProducto' 			     	=> 'Menta best',
          		'descripcion_producto'		=> '-',
          		'estado' 				         	=> '1',
       			  'created_at' 		       		=> date('Y-m-d H:m:s'),
        		  'updated_at' 		       		=> date('Y-m-d H:m:s')
          ));
    }
}
