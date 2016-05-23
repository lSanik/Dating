<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagesMedia extends Model
{
    protected $table = 'pages_media';

    protected $fillable = [
        'media',
    ];

    public function page()
    {
        return $this->belongsTo('App\Models\Pages');
    }
}
