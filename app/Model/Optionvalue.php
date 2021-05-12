<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Optionvalue extends Model
{
    protected $fillable = [
        'option_id', 'name', 'image', 'description', 'sort'
    ];

    public function option()
    {
        return $this->belongsTo('App\Model\Option');
    }
}
