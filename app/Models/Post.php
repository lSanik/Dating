<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;


class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'cover_image'
    ];


    public function lang( $lang = null )
    {
        if ($lang == null) {
            $lang = App::getLocale();
        }
        return $this->hasMany('App\Models\PostTranslation')->where('locale', '=', $lang);
    }
}
