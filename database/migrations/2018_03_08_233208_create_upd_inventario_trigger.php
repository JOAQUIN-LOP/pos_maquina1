<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdInventarioTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(' 

            CREATE TRIGGER upd_inventario AFTER INSERT ON detalle_inventario
            FOR EACH ROW BEGIN

                UPDATE inventario SET total_cantidad_productos = total_cantidad_productos + cantidad_total, total_cantidad_inventario = total_cantidad_inventario + subtotal_inventario
                WHERE idInventario = NEW.idInventario;

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
        //
    }
}
