<?php

namespace App;

use Actuallymab\LaravelComment\Commentable;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Blog extends Model
{
    use Commentable;
    use Mediable;

    protected $mustBeApproved = false;
    protected $canBeRated = false;
    protected $table = 'blog';
    protected $fillable = [
        'nombre', 'nombre_es', 'descripcion', 'descripcion_es', 'fecha','usuario_id'
    ];
    const TAG_PICTURE = 'foto-blog';
}
