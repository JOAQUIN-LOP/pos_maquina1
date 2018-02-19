<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Usuario extends Model
{
    use SoftDeletes;
    protected $table = 'usuario';

    protected $fillable = array('nom_usuario','apellidos', 'user','password','ACTIVO','empresa_id');                                                                          

    protected $hidden = ['deleted_at', 'created_at','updated_at'];

    protected $dates = ['deleted_at'];
}
