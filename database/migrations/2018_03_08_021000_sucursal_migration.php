<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SucursalMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursal', function (Blueprint $table) {
            $table->increments('idSucursal');
            $table->integer('idEmpresa')->unsigned();
            $table->string('nom_sucursal',75)->unique();
            $table->boolean('estado')->default(true);


            //creando la relacion con la tabla empresa
            $table->foreign('idEmpresa')->references('idEmpresa')->on('empresa');

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
        Schema::dropIfExists('sucursal');
    }
}
