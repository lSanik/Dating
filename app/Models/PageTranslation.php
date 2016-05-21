<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    protected $table = 'pages_translations';

    protected $fillable = [
        'title', 'body', 'locale'
    ];

    public function page()
    {
        return $this->belongsTo('App\Models\Pages');
    }
}
