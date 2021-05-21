<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name', 'status', 'start_date', 'end_date'
    ];

    protected $casts = [
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
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
