<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'type_id', 'name',
    ];

    public function options()
    {
        return $this->hasMany('App\Model\Option');
    }

    public function optionvalues()
    {
            return $this->hasMany('App\Model\Optionvalue');
    }
}
