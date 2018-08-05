<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageContact extends Model
{
    //
    protected $fillable = [
        'name', 'user_id', 'subject', 'phone','message', 'id'
    ];
    const STATUS_MESSAGE = "UNREAD";

    public static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->status = MessageContact::STATUS_MESSAGE;
        });
    }
}
