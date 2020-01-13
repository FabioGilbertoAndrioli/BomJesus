<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['name','measure','cpdDispositive'];

    public function location(){
        return $this->morphMany(Location::class, 'Locationtable');
    }
}
