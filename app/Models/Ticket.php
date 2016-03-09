<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'subject', 'status', 'viewed', 'u_id'
    ];

    public function messages()
    {
        return $this->hasMany('App\Models\TicketData', 'id', 't_id');
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
