<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'usuario_id', 'blog_id', 'comentario','fecha','estado'
    ];

    public  function  Usuario()
    {
        return $this->belongsTo('App\User');
    }
    public  function  Blog()
    {
        return $this->belongsTo('App\Blog');
    }
}
