<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public static function match($email, $password)
    {
        return ($email == 'vaccine@admin.com') && ($password == 'covid19@vaccine') ? 1 : 0;
    }
}
