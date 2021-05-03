<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Exclude extends Model
{
    protected $fillable = [
        'booking_id', 'name'
    ];
}
