<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'form_id', 'name', 'help_text', 'placeholder', 'error_message', 'sort', 'status'
    ];
}
