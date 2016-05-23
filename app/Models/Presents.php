<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Presents extends Model
{
    protected $table = 'presents';

    protected $fillable = [
        'partner_id', 'image', 'price',
    ];

    public function partner()
    {
        return $this->hasOne('App\Models\User', 'id', 'partner_id');
    }

    public function lang(string $lang)
    {
        if ($lang == null) {
            $lang = App::getLocale();
        }

        return $this->hasMany('App\Models\PresentsTranslation')->where('locale', '=', $lang);
    }

    public function translation()
    {
        return $this->hasMany('App\Models\PresentsTranslation', 'id', 'present_id');
    }

    public function forUser(int $user_id, string $locale)
    {
        //SELECT
        //
        // presents.id,
        // presents.image,
        // presents.price,
        // presents_translations.title,
        // presents_translations.description,
        //
        // FROM presents
        //
        // RIGHT JOIN presents_translations ON
        // presents.id = presents_translations.present_id
        //
        // WHERE presents.partner_id = 3 AND presents_translations.locale = Config::get('app.locale')
    }

    public function getAll()
    {
        $query = DB::table('presents')
            ->join('presents_translations', 'presents.id', '=', 'presents_translations.present_id')
            ->select('presents.id', 'presents.image', 'presents.price', 'presents_translations.title', 'presents_translations.description')
            ->where('presents.partner_id', \Auth::user()->id)
            ->where('presents_translations.locale', \App::getLocale())
            ->get();

        return $query;
    }
}
