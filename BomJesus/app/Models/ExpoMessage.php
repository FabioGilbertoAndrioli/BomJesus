<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpoMessage extends Model
{
    protected $fillable = ['title','body','user_id'];
}
