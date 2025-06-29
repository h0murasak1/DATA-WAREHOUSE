<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactVisits extends Model
{
    protected $table = 'fact_visits';

    protected $fillable = [
        'date_id',
        'comic_id',
        'user_id',
        'location_id',
        'age_id',
        'device',
    ];

    public function date()
    {
        return $this->belongsTo(DimDate::class, 'date_id');
    }

    public function comic()
    {
        return $this->belongsTo(DimComic::class, 'comic_id');
    }

    public function user()
    {
        return $this->belongsTo(DimUser::class, 'user_id');
    }

    public function location()
    {
        return $this->belongsTo(DimLocation::class, 'location_id');
    }

    public function age()
    {
        return $this->belongsTo(DimAge::class, 'age_id');
    }
}
