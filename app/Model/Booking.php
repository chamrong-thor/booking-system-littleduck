<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name', 'status'
    ];

    public function forms()
    {
        return $this->hasMany('App\Model\Form');
    }

    public function timeslots()
    {
        return $this->hasMany('App\Model\Timeslot');
    }

    public function excludes()
    {
        return $this->hasMany('App\Model\Exclude');
    }
}
