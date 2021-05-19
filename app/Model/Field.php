<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'form_id', 'type_id', 'name', 'help_text', 'placeholder', 'error_message', 'sort', 'required', 'status'
    ];

    public function form()
    {
        return $this->belongsTo('App\Model\Form');
    }

    public function type()
    {
        return $this->belongsTo('App\Model\Type');
    }

    public function optionvalues()
    {
        return $this->hasMany('App\Model\Optionvalue');
    }
}
