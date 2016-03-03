<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    protected $fillable = [
        'user_id', 'gender', 'birthday',
        'height', 'weight', 'eye',
        'hair', 'education', 'kids',
        'want_kids', 'family', 'religion',
        'smoke', 'drink', 'occupation'
    ];

    public function user(){
        $this->hasOne('User', null, 'user_id');
    }

    public function getEnum($field)
    {
        $type = DB::select( DB::raw("SHOW COLUMNS FROM {$this->table} WHERE Field = '{$field}'") )[0]->Type;

        preg_match('/^enum\((.*)\)$/', $type, $matches);

        $enum = [];

        foreach( explode(',', $matches[1]) as $value )
        {
            $v = trim( $value, "'" );
            $enum = array_add($enum, $v, $v);
        }

        return $enum;
    }

}
