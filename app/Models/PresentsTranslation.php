<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresentsTranslation extends Model
{
    protected $table = 'presents_translations';

    protected $fillable = [
        'present_id', 'locale', 'name'
    ];

    public function present()
    {
        $this->hasOne('App\Models\Presents', 'id', 'present_id');
    }
}
