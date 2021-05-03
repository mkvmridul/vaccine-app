<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $table = "Vaccine";
    public $timestamps = false;
    protected $fillable = [
        'vaccineGroup',
        'name',
        'type'
    ];
}
