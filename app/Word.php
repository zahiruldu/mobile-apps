<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    
     protected $fillable = [
        'ar', 'en', 'bn','desc',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'id',
    // ];

}
