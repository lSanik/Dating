<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presents extends Model
{
    protected $table = 'presents';

    protected $fillable = [
        'partner_id', 'image', 'price'
    ];

    public function partner()
    {
        $this->hasOne('App\Models\User', 'id', 'partner_id');
    }


    public function translation()
    {
        $this->hasMany('App\Models\PresentsTranslation', 'present_id', 'id');
    }

}
