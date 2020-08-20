<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = "students";
    public $timestamps = true;

    protected $fillable = [
        'name', 'major'
    ];
}
