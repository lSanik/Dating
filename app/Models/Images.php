<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Images extends Model
{

    protected $table = 'album_images';

    protected $fillable = ['album_id', 'image'];

    public function album()
    {
        return $this->belongsTo('App\Album', 'album_id');
    }
}
