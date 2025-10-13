<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $table = 'leads'; 

    protected $fillable = [
        'company_name',
        'location',
        'field_of_requirement',
        'candidate_number',
        'days',



    ];

}
