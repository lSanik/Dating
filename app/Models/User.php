<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'status_id',
        'partner_id',
        'role_id',
        'city_id',
        'country_id',
        'avatar'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tickets()
    {
        return $this->hasMany('App\Models\TicketData', 'user_id', 'id');
    }

    //Status
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    public function hasStatus( $status )
    {
        echo $status;
        $this->has_status = $this->getStatus();
        echo $this->has_status->name;

         if( is_array( $status ) )
        {
            foreach( $status as $status ){
                if( $this->checkUserStatus($status) )
                {
                    return true;
                }
            }
        } else {
            return $this->checkUserStatus($status);
        }

        return false;

    }

    public function getStatus()
    {
        return $this->status()->getResults();
    }

    public function checkUserStatus($need_status)
    {
        return (strtolower($need_status)==strtolower($this->has_status->name)) ? true : false;
    }

    // Social Media Auth
    public function social()
    {
        $this->hasMany('App\Models\Social');
    }


    // The User model
    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

    //User role
    public function hasRole($roles)
    {
        $this->have_role = $this->getUserRole();
        // Check if the user is a root account
        if($this->have_role->name == 'Owner') {
            return true;
        }
        if(is_array($roles)){
            foreach($roles as $need_role){
                if($this->checkIfUserHasRole($need_role)) {
                    return true;
                }
            }
        } else{
            return $this->checkIfUserHasRole($roles);
        }
        return false;
    }

    private function getUserRole()
    {
        return $this->role()->getResults();
    }

    private function checkIfUserHasRole($need_role)
    {
        return (strtolower($need_role)==strtolower($this->have_role->name)) ? true : false;
    }
    /** End roles */

    /** Cities */
    public function city()
    {
        return $this->hasOne('App\Models\City','id');
    }

    /** End cities */

    /** Presents for partner */

    public function presents()
    {
        return $this->hasMany('App\Models\Presents', 'partner_id', 'id');
    }

    /** Profile */
    public function profile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id', 'id');
    }

    public function passport()
    {
        return $this->hasOne('App\Models\Passport', 'user_id', 'id');
    }

}
