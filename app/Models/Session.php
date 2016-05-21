<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $hidden = ['payload'];

    public $table = 'session';

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeGuests($query)
    {
        return $query->whereNull('user_id')
            ->where(
                    'last_activity',
                    '>=',
                    strtotime(
                        Carbon::now()->subMinutes(
                            Config::get('custom.activity_limit')
                        )
                    )
            );
    }

    public function scopeRegistered($query)
    {
        return $query->whereNotNull('user_id')
            ->where(
                'last_activity',
                '>=',
                strtotime(
                    Carbon::now()->subMinutes(
                        Config::get('custom.activity_limit')
                    )
                )
            )
            ->with('user');
    }

    public function updateCurrentUser($query)
    {
        return $query->where('id', Session::getId())->update([
            'user_id' => ! empty(Auth::user()) ? Auth::id() : null
        ]);
    }

    public function isUserOnline($id, $query)
    {
        if( $query->where('user_id', '=', $id) )
            return true;
        else
            return flase;
    }
}
