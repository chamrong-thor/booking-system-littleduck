<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'booking_id', 'name', 'status'
    ];
}
