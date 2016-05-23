<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Why extends Model
{
    protected $table = 'custom_comment';

    protected $fillable = [
        'uid', 'meta_key', 'meta_value',
    ];
}
