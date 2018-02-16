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
            $table->string('nomProducto',75);
            $table->string('unidad',75);
            $table->float('precio_compra',8,2);
            $table->float('existencia',8,2);
            $table->boolean('ACTIVO')->default(true);

            $table->integer('tipo_id')->unsigned();
            $table->integer('inv_num')->unsigned();

            //creando la relacion con la tabla tipo_producto
            $table->foreign('tipo_id')
                ->references('idTipoProducto')
                ->on('tipo_producto')
                ->onDelete('cascade');

            //creando la relacion con la tabla inventario
            $table->foreign('inv_num')
                ->references('num_inventario')
                ->on('inventario')
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
        Schema::dropIfExists('producto');
    }
}
