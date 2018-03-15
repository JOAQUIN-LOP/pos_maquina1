<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdInventarioSucursalTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('

            CREATE TRIGGER upd_inventario_sucursal AFTER INSERT ON detalle_inventario_sucursal
                for each row 
                BEGIN
                    UPDATE inventario_sucursal SET total_cantidad_productos = total_cantidad_productos + NEW.cantidad_total, total_cantidad_inventario = total_cantidad_inventario + NEW.subtotal_inventario
                            WHERE idInventarioSucursal = NEW.idInventarioSucursal;
                END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `upd_inventario_sucursal`');
    }
}
