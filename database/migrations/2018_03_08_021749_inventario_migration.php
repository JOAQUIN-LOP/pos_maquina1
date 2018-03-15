<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventarioMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->increments('idInventario');
            $table->integer('num_inventario');
            $table->integer('idEmpresa')->unsigned();
            $table->integer('mes');
            $table->integer('anio');
            $table->date('fecha');
            $table->decimal('total_cantidad_productos',8,2);
            $table->decimal('total_cantidad_inventario',11,2);
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
        Schema::dropIfExists('inventario');
    }
}
