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
    const ESTADO_ACTIVO= 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';
    const ESTADO_PENDING = 'PENDIENTE';
    const TAG_PICTURE = 'foto-lugares';
    protected $fillable = [
        'nombre', 'latitud', 'longitud','descripcion','estado'
    ];

    public static function getEstados() {
        return ['ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO', 'PENDIENTE' => 'PENDIENTE'];
    }
}
