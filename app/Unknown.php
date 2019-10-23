<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unknown extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'email', 'postal', 'instagram', 'guest-firstName',' guest-lastName', 'guest-email'
    ];

    
}
