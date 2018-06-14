<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    //
    protected $table = 'sucursal';

    protected $primaryKey = 'idSucursal';

    protected $fillable =  array('idEmpresa','nom_sucursal', 'estado');

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    protected $dates =['deleted_at'];
}
