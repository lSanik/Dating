<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'slug', 'image'
    ];

    public function media()
    {
        return $this->hasMany('App\Models\PagesMedia');
    }

    public function translations()
    {
        return $this->hasMany('App\Models\PageTranslation');
    }
}
