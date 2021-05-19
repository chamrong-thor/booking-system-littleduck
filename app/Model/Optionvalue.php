<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Optionvalue extends Model
{
    protected $fillable = [
        'field_id', 'name', 'image', 'description', 'sort'
    ];

    public function field()
    {
        return $this->belongsTo('App\Model\Field');
    }
}
