<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Social extends Model
{
    protected $table = 'socials_login';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeGuests($query)
    {
        return $query->whereNull('user_id')->where('last_activity', '>=', strtotime(Carbon::now()->subMinutes(Config::get('custom.activity_limit'))));
    }

    public function scopeRegistered($query)
    {
        return $query->whereNotNull('user_id')->where('last_activity', '>=', strtotime(Carbon::now()->subMinutes(Config::get('custom.activity_limit'))))->with('user');
    }

    public function scopeUpdateCurrent($query)
    {
        return $query->where('id', Session::getId())->update([
            'user_id' => !empty( Auth::user() ) ? Auth::id() : null
        ]);
    }
}
