<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
