<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employeelog extends Model
{

    protected $table = 'employeelogs';
    protected $fillable = [
        'email',
        'password',
        'login_time',
    ];
}
