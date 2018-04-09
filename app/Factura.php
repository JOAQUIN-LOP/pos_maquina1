<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{

	protected $table = 'factura';

	protected $fillable = array('num_factura','idEmpresa', 'idSucursal','idUsuario', 'dia', 'mes', 'anio', 'fecha','hora', 'direccion','total_factura','estado');

    protected $hidden = ['deleted_at', 'created_at','updated_at'];

    protected $dates = ['deleted_at'];
}
