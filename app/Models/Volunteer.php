<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Volunteer extends Authenticatable
{
    use HasApiTokens;
    protected $table = "Volunteer";

    public $timestamps = false;

    protected $hidden = [
        'passwordHash',
        'remember_token'
    ];

    protected $fillable = [
        'email',
        'fullName',
        'gender',
        'age',
        'address',
        'health_condition',
        'passwordHash',
        'vaccineGroup',
        'dose',
        'infected'
    ];
    public static function efficacyRate()
    {
        return (self::whereVaccinegroup('B')->count() - self::whereVaccinegroup('A')->count()) / self::whereVaccinegroup('B')->count();
    }
}
