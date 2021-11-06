<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lenguajeProgramacion extends Model
{
    protected $table='lenguaje_programacion';
    public $timestamps=false;
    protected $fillable=[
        'id_lenguaje', 'descripcion'
    ];

    protected $primaryKey='id_lenguaje';
}
