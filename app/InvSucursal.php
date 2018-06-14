<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvSucursal extends Model
{
    //
    protected $table = 'inventario_sucursal';

    protected $primaryKey = 'idInventarioSucursal';

    protected $fillable =  array('num_inventario_sucursal','idSucursal', 'mes', 'anio', 'fecha','cantidad_total_productos', 'total_cantidad_inventario', 'estado');

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    protected $dates =['deleted_at'];
}
