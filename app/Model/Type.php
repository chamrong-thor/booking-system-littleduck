<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'field_id', 'name'
    ];

    public function options()
    {
        return $this->hasMany('App\Model\Option');
    }

    public function field()
    {
        return $this->belongsTo('App\Model\Field');
    }
}
