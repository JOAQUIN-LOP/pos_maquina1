<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventarioSucursalMigrate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_sucursal', function (Blueprint $table) {
            $table->increments('idInventario_sucursal');
            $table->string('mes',12);
            $table->string('anio',10);
            $table->date('fecha');
            $table->float('cantidad',8,2);
            $table->string('descripcion',75);
            $table->float('precio_compra',8,2);
            $table->float('total_inv_sucursal',8,2);
            $table->boolean('ACTIVO')->default(true);


            $table->integer('empresa_id')->unsigned();
            $table->integer('sucursal_id')->unsigned();

            //creando la relacion con la tabla empresa
            $table->foreign('empresa_id')
                ->references('idEmpresa')
                ->on('empresa')
                ->onDelete('cascade');


            //creando la relacion con la tabla sucursal
            $table->foreign('sucursal_id')
                ->references('idSucursal')
                ->on('sucursal')
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
        Schema::dropIfExists('inventario_sucursal');
    }
}
