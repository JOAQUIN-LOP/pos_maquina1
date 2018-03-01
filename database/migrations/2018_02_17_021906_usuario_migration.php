<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuarioMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('idUsuario');
            $table->string('nom_usuario',75);
            $table->string('apellidos',75);
            $table->string('rol',75);
            $table->string('user',75)->unique();
            $table->string('password',75);
            $table->boolean('estado')->default(true);
            $table->string('remember_token', 100)->nullable();

            $table->integer('empresa_id')->unsigned();
            //creando la relacion con la tabla empresa
            $table->foreign('empresa_id')->references('idEmpresa')->on('empresa');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
