<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

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
        'use_register_code',
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


    /**
     * Relations
     */
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

    public function bonusPayouts()
    {
        return $this->hasMany(BonusPayout::class, 'user_id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }


    /**
     * Accessors
     */
    public function getFullNameAttribute(){
        switch ($this->user_type_id){
            case 1:
                $profile = $this->userPurchaserProfile()->first();
                return $profile->first_name.' '.$profile->family_name[0].'.';
                break;
            case 3:
                $profile = $this->userCarerProfile()->first();
                return $profile->first_name.' '.$profile->family_name[0].'.';
                break;
        }
    }

    public function getFirstNameAttribute(){
        switch ($this->user_type_id){
            case 1:
                $profile = $this->userPurchaserProfile()->first();
                return $profile->first_name;
                break;
            case 3:
                $profile = $this->userCarerProfile()->first();
                return $profile->first_name;
                break;
        }
    }
    public function getShortFullNameAttribute(){
        return $this->first_name.' '.mb_substr($this->family_name,0,1);
    }

    public function getFamilyNameAttribute(){
        switch ($this->user_type_id){
            case 1:
                $profile = $this->userPurchaserProfile()->first();
                return $profile->family_name;
                break;
            case 3:
                $profile = $this->userCarerProfile()->first();
                return $profile->family_name;
                break;
        }
    }

    public function getBonusBalanceAttribute(){
        if($this->user_type_id = 3){
            $res = DB::select('SELECT SUM(amount) as amount FROM bonus_transactions WHERE user_id = '.$this->id);
            return $res[0]->amount;
        }
        return 0;
    }

    public function getProfileLinkAttribute(){
        switch ($this->user_type_id){
            case 1:
                break;
            case 3:
                return '/carer/profile/'.$this->id;
                break;
        }
    }


    public function getCompletedAppointmentsHoursAttribute()
    {
        if ($this->user_type_id === 3) {
            $sql = 'SELECT a.id FROM appointments a LEFT JOIN bookings b ON a.booking_id = b.id WHERE a.status_id = 4  AND b.carer_id = ' . $this->id;
        } else {
            $sql = 'SELECT a.id FROM appointments a LEFT JOIN bookings b ON a.booking_id = b.id WHERE a.status_id = 4  AND b.purchaser_id = ' . $this->id;
        }
        $res = DB::select($sql);
        $appointments = Appointment::findMany(array_pluck($res, 'id'));

        $hours = 0;
        foreach ($appointments as $appointment)
            $hours += $appointment->hours;

        return $hours;
    }


    public function getAccountStatusAttribute() {

        //check for blocking purchaser account

        if ($this->isPurchaser() && $this->userPurchaserProfile->profiles_status_id==5)
            return 'blocked';

        return;


    }

    /**
     * Helpers methods
     */
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
            if ($this->userCarerProfile->registration_status != 'new') {
                return true;
            }
        }
        if ($this->user_type_id == 1) { //purchaser
            if ($this->userPurchaserProfile->registration_status != 'new') {
                //return true;
                return true;
            }
        }
        return false;
    }

    public function hasBookingsWith(ServiceUsersProfile $profile){
        return Booking::where('carer_id', $this->id)
            ->where('service_user_id', $profile->id)
            ->get()
            ->count();
    }
}
