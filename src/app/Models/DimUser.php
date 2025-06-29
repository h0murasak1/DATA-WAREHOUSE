<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimUser extends Model
{
    protected $table = 'dim_users';

    protected $fillable = [
        'gender',
    ];
}
