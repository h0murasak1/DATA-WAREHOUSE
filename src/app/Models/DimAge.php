<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimAge extends Model
{
    protected $table = 'dim_ages';

    protected $fillable = [
        'age_group',
    ];
    
}
