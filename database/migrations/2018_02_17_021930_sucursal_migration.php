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
            $table->string('nom_sucursal',75);
            $table->boolean('ACTIVO')->default(true);


            $table->integer('empresa_id')->unsigned();

            //creando la relacion con la tabla empresa
            $table->foreign('empresa_id')
                ->references('idEmpresa')
                ->on('empresa')
                ->onDelete('cascade');

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
