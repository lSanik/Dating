<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;


class Post extends Model
{

    use SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'cover_image'
    ];


    public function lang( $lang  )
    {
        return $this->hasMany('App\Models\PostTranslation')->where('locale', '=', $lang);
    }

}
