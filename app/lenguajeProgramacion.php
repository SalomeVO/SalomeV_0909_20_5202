<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lenguajeProgramacion extends Model
{
    protected $table='lenguaje_programacion';
    public $timestamps=false;
    protected $fillable=[
        'id_lenguaje', 'lenguaje_descripcion'
    ];

    protected $primaryKey='id_lenguaje';
}
