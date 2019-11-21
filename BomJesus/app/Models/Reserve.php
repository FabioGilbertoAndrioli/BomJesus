<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = ['classes','level','class','user_id','car_id','period','date'];

    protected $casts = [
        'classes' => 'array'
    ];
}

