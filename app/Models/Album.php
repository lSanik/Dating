<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    //use SoftDeletes;

    protected $table = 'album';

    protected $fillable = [
        'name', 'cover_image', 'user_id'
    ];

    public function Photos()
    {
        return $this->hasMany('App\Models\Images', 'album_id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
