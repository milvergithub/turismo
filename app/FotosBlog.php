<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotosBlog extends Model
{
    protected $table = 'fotos_blog';
    protected $fillable = [
        'foto_id', 'blog_id'
    ];

    public  function  Foto()
    {
        return $this->belongsTo('App\Fotos');
    }

    public  function  Blog()
    {
        return $this->belongsTo('App\Blog');
    }
}
