<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crowdword extends Model
{
    protected $fillable = [
        'ar', 'en', 'bn','desc','username','email',
    ];

}
