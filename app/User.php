<?php

namespace App;

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
        'email', 'password', 'user_type_id', 'referal_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_key',
    ];


    public function userPurchaser()
    {
        return $this->hasMany('App\Booking','purchaser_id','id');
    }

    public function userService()
    {
        return $this->hasMany('App\Booking','service_user_id','id');
    }

    public function userCarer()
    {
        return $this->hasMany('App\Booking','carer_id','id');
    }

    public function userCarerProfile()
    {
        return $this->hasOne('App\CarersProfile','id','id');
    }


    public function userName()
    {

        if ($this->user_type_id==3) {

            return $this->userCarerProfile->like_name;

        }

        return $this->id;
    }

}
