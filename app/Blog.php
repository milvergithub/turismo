<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $table = 'blog';
    protected $fillable = [
        'nombre', 'descripcion', 'fecha','usuario_id'
    ];
    //
    public   function  fotosBlog()
    {
        return $this->hasMany('App\FotosBlog','blog_id');
    }

    public   function  fotoPrimero()
    {
        if(isset($this->fotosBlog()->first()->foto))
        {
            return $this->fotosBlog()->first()->foto->getFotoPath();

        }else{
            return '';
        }

    }

    public   function  comentarios()
    {
        return $this->hasMany('App\Comentario');
    }
}
