<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    protected $fillable = [
        'booking_id',
        'start_date',
        'end_date'
    ];
}
