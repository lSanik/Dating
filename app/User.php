<?php

namespace App;

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
        'first_name', 'last_name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationship Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Many-To-Many Relationship Method for accessing the User->roles
     *
     * @return QueryBuilder Object
     */
    public function role()
    {
        return $this->hasMany('App\Role', 'id', 'role_id');
    }

    public function hasRole($roles)
    {
        $this->have_role = $this->getUserRole();

        if( $this->have_role->name == 'Owner')
        {
            return true;
        }

        if( is_array('roles') )
        {
            foreach($roles as $need_role)
            {
                if($this->checkIfUserHasRole($need_role))
                {
                    return true;
                }
            }
        } else {
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
        return( strtolower($need_role) == strtolower($this->have_role->name)) ? true : false;
    }


}
