<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;

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

    public function reserveChart(){
        return $reserves = DB::select("SELECT DATE_FORMAT(date, '%Y %M') as 'dat',COUNT(DATE_FORMAT(date, '%M')) as qtd FROM `reserves` GROUP by dat order by date
         ");
    }
}

