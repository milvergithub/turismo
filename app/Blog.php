<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Blog extends Model
{
    use Mediable;
    protected $table = 'blog';
    protected $fillable = [
        'nombre', 'descripcion', 'fecha','usuario_id'
    ];
    const TAG_PICTURE = 'foto-blog';
    //
    public   function  comentarios()
    {
        return $this->hasMany('App\Comentario');
    }
}
