<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Passport extends Model
{


    protected $table = 'passport';

    protected $fillable = [
        'passno', 'date', 'cover'
    ];

    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\PassportPhotos');
    }
}
