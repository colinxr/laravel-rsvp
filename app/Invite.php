<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
  protected $fillable = [
    'firstName', 'lastName', 'email', 'postal', 'instagram', 'gender', 'company', 'role', 'category', 'guest_of', 'guest-firstName', ' guest-lastName', 'guest-email', 'status',
  ];
}
