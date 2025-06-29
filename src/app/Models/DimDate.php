<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimDate extends Model
{
    protected $table = 'dim_dates';

    protected $fillable = [
        'date',
        'day_name',
        'month',
        'year',
    ];

    public function factVisits()
    {
        return $this->hasMany(FactVisits::class, 'date_id');
    }
}
