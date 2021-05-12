<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'booking_id', 'name', 'status'
    ];

    public function booking()
    {
        return $this->belongsTo('App\Model\Booking');
    }

    public function fields()
    {
        return $this->hasMany('App\Model\Field');
    }
}
