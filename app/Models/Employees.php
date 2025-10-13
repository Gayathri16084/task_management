<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employees extends Model
{
    use HasFactory;

    protected $table = 'employees'; 

    protected $fillable = [
        'image',
        'name',
        'email',
        'department',
        'phone',
    ];

   
}
