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

    public static function rulesSpanish() {
        return [
            'nombre_es' => 'required',
            'descripcion_es'  => 'required',
        ];
    }

    public static function rulesEnglish() {
        return [
            'nombre' => 'required',
            'descripcion'  => 'required',
        ];
    }

    public static function rules() {
        return [
            'nombre' => 'required',
            'descripcion'  => 'required',
            'nombre_es' => 'required',
            'descripcion_es'  => 'required',
        ];
    }
}
