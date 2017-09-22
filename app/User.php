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
        'email',
        'password',
        'user_type_id',
        'referral_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activation_key',
    ];


    public function userPurchaser()
    {
        return $this->hasMany('App\Booking', 'purchaser_id', 'id');
    }

    public function userService()
    {
        return $this->hasMany('App\Booking', 'service_user_id', 'id');
    }

    public function userCarer()
    {
        return $this->hasMany('App\Booking', 'carer_id', 'id');
    }

    public function userCarerProfile()
    {
        return $this->hasOne('App\CarersProfile', 'id', 'id');
    }

    public function userPurchaserProfile()
    {
        return $this->hasOne('App\PurchasersProfile', 'id', 'id');
    }

    public function bonusAcceptors()
    {
        return $this->hasMany('App\Bonuses_record', 'user_acceptor_id', 'id');
    }

    public function bonusDonors()
    {
        return $this->hasMany('App\Bonuses_record', 'user_donor_id', 'id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }


    public function userName()
    {
        if ($this->user_type_id == 3) {
            return $this->userCarerProfile->first_name.'&nbsp'.mb_substr($this->userCarerProfile->family_name,0,1).'.';
        }

        if ($this->user_type_id == 1) {
            return $this->userPurchaserProfile->first_name.'&nbsp'.mb_substr($this->userPurchaserProfile->family_name,0,1).'.';
        }
        return $this->id;
    }

    public function isCarer()
    {
        if ($this->user_type_id == 3) {
            return true;
        }
        return false;
    }

    public function isPurchaser()
    {
        if ($this->user_type_id == 1) {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        if ($this->user_type_id == 4) {
            return true;
        }
        return false;
    }
    public function isReregistrationCompleted()
    {



        if ($this->user_type_id == 3) { //carer
            if ($this->userCarerProfile->registration_progress == '20') {
                return true;
            }
        }
        if ($this->user_type_id == 1) { //purchaser
            if ($this->userPurchaserProfile->registration_progress == '4_1_2_1') {
                //return true;
                return true;
            }
        }

        return false;
    }

}
