<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimComic extends Model
{
    protected $table = 'dim_comics';

    protected $fillable = [
        'title',
        'genre',
    ];
}
