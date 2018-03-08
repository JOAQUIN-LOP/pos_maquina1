<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->delete();

        Usuario::create(array(
            'idEmpresa'         => 1,
    		'nom_usuario'		=> 'Pablo',
    		'apellidos'			=> 'Lara',
            'rol'               => 'admin',
    		'user'				=> 'admin',
    		'password'			=> Hash::make('123456'),
            'estado'            => '1'
        ));
    }
}