<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use \HighIdeas\UsersOnline\Traits\UsersOnlineTrait;

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
        'state_id',
        'country_id',
        'avatar',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messagesFrom()
    {
        return $this->hasMany('App\Models\Messages', 'from_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messagesTo()
    {
        return $this->hasMany('App\Models\Messages', 'to_user', 'id');
    }

    /**
     * @return mixed
     */
    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function social()
    {
        return $this->hasMany('App\Models\Social', 'user_id');
    }

    /** Social auth */

    /**
     * Check user role.
     *
     * @param $roles
     *
     * @return bool
     */
    public function hasRole($roles)
    {
        $this->have_role = $this->getUserRole();
        // Check if the user is a root account
        if ($this->have_role->name == 'Owner') {
            return true;
        }
        if (is_array($roles)) {
            foreach ($roles as $need_role) {
                if ($this->checkIfUserHasRole($need_role)) {
                    return true;
                }
            }
        } else {
            return $this->checkIfUserHasRole($roles);
        }

        return false;
    }

    /** User roles  */

    /**
     * @return mixed
     */
    private function getUserRole()
    {
        return $this->role()->getResults();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

    /**
     * @param $need_role
     *
     * @return bool
     */
    private function checkIfUserHasRole($need_role)
    {
        return (strtolower($need_role) == strtolower($this->have_role->name)) ? true : false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function city()
    {
        return $this->hasOne('App\Models\City', 'id');
    }

    /** End roles */

    /** Cities */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presents()
    {
        return $this->hasMany('App\Models\Presents', 'partner_id', 'id');
    }

    /** End cities */

    /** Presents for partner */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id', 'id');
    }

    /** Profile */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function passport()
    {
        return $this->hasOne('App\Models\Passport', 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'froms', 'id');
    }

    /** Tickets Relations */

    /**
     * Ticket Message check status.
     *
     * @param $status
     *
     * @return bool
     */
    public function hasStatus($status)
    {
        echo $status;
        $this->has_status = $this->getStatus();
        echo $this->has_status->name;

        if (is_array($status)) {
            foreach ($status as $status) {
                if ($this->checkUserStatus($status)) {
                    return true;
                }
            }
        } else {
            return $this->checkUserStatus($status);
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status()->getResults();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    /**
     * @param $need_status
     *
     * @return bool
     */
    public function checkUserStatus($need_status)
    {
        return (strtolower($need_status) == strtolower($this->has_status->name)) ? true : false;
    }

    /** Chat messages */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chatMessages()
    {
        return $this->hasMany('App\Models\ChatMessages', 'user_id');
    }

    /** User finance */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finance()
    {
        return $this->hasMany('App\Models\Finance');
    }

    public function userPay()
    {
        return $this->hasMany('App\Models\Expenses', 'user_id');
    }

    public function girlHave()
    {
        return $this->hasMany('App\Models\Expenses', 'girl_id');
    }
}
