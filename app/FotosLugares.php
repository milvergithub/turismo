<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotosLugares extends Model
{
    protected $primaryKey = 'id';
    //protected  $relations
    protected $fillable = [
        'foto_id', 'lugares_id'
    ];

    public  function  Lugar()
    {
        return $this->belongsTo('App\LugarTuristico');
    }

    public  function  Foto()
    {
        return $this->belongsTo('App\Fotos');
    }
}
