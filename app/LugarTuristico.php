<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LugarTuristico extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const ESTADO_ACTIVO= 'Activo';
    const ESTADO_INACTIVO = 'Inactivo';
    protected $fillable = [
        'nombre', 'latitud', 'longitud','descripcion','estado'
    ];

    public   function  fotosLugares()
    {
        return $this->hasMany('App\FotosLugares','lugares_id');
    }
    public   function  fotoPrimero()
    {
        $photo = $this->fotosLugares()->first();
        if (!empty($photo)) {
            return $photo->foto->getFotoPath();
        }
        return null;
    }
}
