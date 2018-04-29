<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Empresa extends Model
{
    protected $table = 'empresa';

    protected $fillable = array('nom_empresa','direccion', 'ACTIVO');                                                                          

    protected $hidden = ['deleted_at', 'created_at','updated_at'];

    protected $dates = ['deleted_at'];
}
