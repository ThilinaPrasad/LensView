<?php

namespace Laravel;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','address','telephone','role_id','profile_pic', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->hasOne('App\Models\Role');
    }

    public function images(){
        return $this->hasMany('App\Models\Image');
    }

    public function contests(){
        return $this->hasMany('App\Models\Contest');
    }

    public function votes(){
        return $this->hasMany('App\Models\Vote');
    }
}
