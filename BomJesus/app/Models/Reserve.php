<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reserve extends Model
{
    protected $fillable = ['classes','level','class','user_id','car_id','period','date'];

    protected $casts = [
        'classes' => 'array'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function car(){
        return $this->belongsTo(Car::class);
    }
}

