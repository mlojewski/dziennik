<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'excluded_dates'];

    protected $casts = [
        'excluded_dates' => 'array',
    ];

    public function setExcludedDatesAttribute($value)
    {
        $this->attributes['excluded_dates'] = json_encode($value);
    }

    public function getExcludedDatesAttribute($value)
    {
        return json_decode($value, true);
    }
    
    public function stages()
    {
        return $this->hasMany(Stage::class);
    }
}
