<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimLocation extends Model
{
    protected $table = 'dim_locations';

    protected $fillable = [
        'country',
        'city',
    ];
}   
