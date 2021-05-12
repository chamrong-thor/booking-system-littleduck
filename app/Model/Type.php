<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name'
    ];

    public function options()
    {
        return $this->hasMany('App\Model\Option');
    }

    public function fields()
    {
        return $this->hasMany('App\Model\Type');
    }
}
