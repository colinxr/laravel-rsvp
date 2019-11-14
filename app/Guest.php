<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    //    
    protected $fillable = [
        'firstName', 'lastName', 'email', 'postal', 'instagram', 'gender', 'company', 'role', 'category', 'guest_of', 'guest-firstName', 'guest-lastName', 'guest-email', 'status',
    ];

    public function scopeUnknown($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function approve() 
    {
        $this->update(['status' => 'approved']);
    }

    public function deny()
    {
        $this->update(['status' => 'denied']);
    }
}
