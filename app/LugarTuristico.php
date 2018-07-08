<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class LugarTuristico extends Model
{
    use Mediable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const ESTADO_ACTIVO= 'Activo';
    const ESTADO_INACTIVO = 'Inactivo';
    const TAG_PICTURE = 'foto-lugares';
    protected $fillable = [
        'nombre', 'latitud', 'longitud','descripcion','estado'
    ];
}
