<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'locale',
        'cover_image',
    ];

    public function lang($lang)
    {
        return $this->hasMany('App\Models\PostTranslation')->where('locale', '=', $lang);
    }

    public function postTrans()
    {
        return $this->hasMany('App\Models\PostTranslation');

        //$this->hasMany('App\Models\PostTranslation')->where('id', '=', $id)->all();
    }

    public function translate()
    {
        return $this->hasMany('App\Models\PostTranslation');
    }
}
