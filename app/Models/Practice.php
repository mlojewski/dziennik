<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    public function stage()
    {
        return $this->belongsTo('App\Models\Stage');
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }

    public function athletes()
    {
        return $this->belongsToMany('App\Models\Athlete');
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
