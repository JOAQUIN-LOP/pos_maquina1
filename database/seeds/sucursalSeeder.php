<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class sucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('sucursal')->insert(array(
              'idEmpresa'           => '1',
          		'nom_sucursal'        => 'La surtidora',
              'estado'              => '1',
              'created_at'          => date('Y-m-d H:m:s'),
              'updated_at'          => date('Y-m-d H:m:s') 
          ));
          DB::table('sucursal')->insert(array(
              'idEmpresa'           => '1',
              'nom_sucursal'        => 'La rendidora',
              'estado'              => '1',
              'created_at'          => date('Y-m-d H:m:s'),
              'updated_at'          => date('Y-m-d H:m:s') 
          ));
          DB::table('sucursal')->insert(array(
              'idEmpresa'           => '1',
              'nom_sucursal'        => 'La ABC',
              'estado'              => '1',
              'created_at'          => date('Y-m-d H:m:s'),
              'updated_at'          => date('Y-m-d H:m:s') 
          ));
          DB::table('sucursal')->insert(array(
              'idEmpresa'           => '1',
              'nom_sucursal'        => 'La Maxi surtidora',
              'estado'              => '1',
              'created_at'          => date('Y-m-d H:m:s'),
              'updated_at'          => date('Y-m-d H:m:s') 
          ));
    }
}
