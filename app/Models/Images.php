<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Images extends Model
{
    use SoftDeletes;

    protected $table = 'images';

    protected $fillable = [
        'album_id',
        'description',
        'image'
    ];
}
