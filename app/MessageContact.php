<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageContact extends Model
{
    //
    protected $fillable = [
        'name', 'user_id', 'subject', 'phone','message', 'id'
    ];
}
