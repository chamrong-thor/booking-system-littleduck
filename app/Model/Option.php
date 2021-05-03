<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'type_id', 'name', 'sort', 'photo'
    ];
}
