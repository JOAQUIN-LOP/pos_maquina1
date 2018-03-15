<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('idProducto');
            $table->integer('tipo_id')->unsigned()->nullable();
            $table->string('codProducto',75)->nullable();
            $table->string('nomProducto',75)->unique();
            $table->string('descripcion_producto',75);
            $table->boolean('estado')->default(true);

            //creando la relacion con la tabla tipo_producto
            $table->foreign('tipo_id')->references('idTipoProducto')->on('tipo_producto');

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
        Schema::dropIfExists('producto');
    }
}
