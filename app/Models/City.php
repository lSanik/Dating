<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'city', 'country_id',
    ];

    public function Countries()
    {
        return $this->hasMany('App\Models\Country', 'country_id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'city_id');
    }
}
