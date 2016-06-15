<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horoscope extends Model
{
    public $timestamps = False;
    protected $table = 'hcompare';

    public function trans()
    {
        return $this->hasMany(HoroscopeTranslate::class);
    }
}
