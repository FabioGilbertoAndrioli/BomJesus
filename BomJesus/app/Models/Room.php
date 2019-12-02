<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name','level','type'];

    public function location(){
        return $this->morphOne(Location::class, 'Locationtable');
    }
}
