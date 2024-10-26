<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    public function schools()
    {
        return $this->belongsToMany('App\Models\School', 'coach_school');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
    
    public function practices()
    {
        return $this->hasMany(Practice::class);
    }
}
