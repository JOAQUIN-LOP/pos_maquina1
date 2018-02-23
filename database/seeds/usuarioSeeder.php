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
    		'nom_usuario'		=> 'Pablo',
    		'apellidos'			=> 'Lara',
    		'user'				=> 'admin',
    		'password'			=> Hash::make('123456'),
    		'empresa_id'		=> 1,
        ));
    }
}