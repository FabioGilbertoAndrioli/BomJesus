<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $fillable = ['name','locationtable_type','locationtable_id'];
    public function locationtable(){
        return $this->morphTo();
    }
}
