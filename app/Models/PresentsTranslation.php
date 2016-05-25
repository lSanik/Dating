<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresentsTranslation extends Model
{
    protected $table = 'presents_translations';

    protected $fillable = [
        'present_id', 'locale', 'title', 'description',
    ];

    public function present()
    {
        $this->belongsTo('App\Models\Presents');
    }
}
