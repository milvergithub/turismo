<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    protected $foto_path ;

    function __construct()
    {
        $this->foto_path  = public_path() . '/uploads/';

    }
    protected $fillable = [
        'nombre', 'extencion', 'ruta'
    ];

    public   function  fotosLugares()
    {
        return $this->hasMany('App\FotosLugares');
    }

    public   function  fotosBlog()
    {
        return $this->hasMany('App\FotosBlog');
    }

    public function getFotoPath(){
        return 'uploads/'. $this->nombre;
    }

    public function getFotoPathShow(){
        return '../uploads/'. $this->nombre;
    }
}
