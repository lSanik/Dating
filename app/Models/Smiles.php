<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Smiles extends Model
{
    protected $table = 'smiles';

    public function fromUser()
    {
        return $this->belongsTo('App\Models\User', 'from');
    }

    public function toUser()
    {
        return $this->belongsTo('App\Models\User', 'to');
    }
}
