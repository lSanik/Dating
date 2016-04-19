<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileMedia extends Model
{
    protected  $table = 'profile_media';

    protected $fillable = [
        'user_id', 'media_key', 'media_value'
    ];

    public function profile()
    {
        return $this->belongsTo('\App\Models\Profile');
    }
}
