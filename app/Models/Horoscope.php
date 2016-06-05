<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horoscope extends Model
{
    protected $table = 'hcompare';

    public $timestamps = False;

    public function trans()
    {
        return $this->hasMany(HoroscopeTranslate::class);
    }
}
