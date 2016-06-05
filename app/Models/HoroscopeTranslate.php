<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoroscopeTranslate extends Model
{
    protected $table = 'htranslate';

    public $timestamps = False;

    public function horoscope()
    {
        return $this->belongsTo(Horoscope::class);
    }
}
