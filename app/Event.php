<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['option', 'value'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function invite()
    { 
        return $this->hasMany(Invite::class);
    }
}