<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Album extends Model
{
    use SoftDeletes;

    protected $table = 'albums';

    protected $fillable = [
        'name', 'description', 'cover_image'
    ];

    public function Photos()
    {
            return $this->hasMany('App\Models\Images', 'album_id');
    }
}
