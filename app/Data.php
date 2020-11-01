<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    // protected $guarded = ['name','age','description'];
    protected $fillable = ['name','age','description'];
}
