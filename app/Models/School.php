<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    public function athletes()
    {
        return $this->hasMany('App\Models\Athlete');
    }

    public function coaches()
    {
        return $this->hasMany('App\Models\Coach');
    }

    public function practices()
    {
        return $this->hasMany('App\Models\Practice');
    }
}
