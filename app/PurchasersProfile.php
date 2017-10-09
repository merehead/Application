<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PurchasersProfile extends Model
{

    public function serviceUsers()
    {
        return $this->hasMany('App\ServiceUsersProfile','purchaser_id','id');
    }


    public function profileStatus(){
        return $this->belongsTo('App\UserStatus','profiles_status_id','id');
    }

    public function setDoBAttribute($value)
    {
        $date = DateTime::createFromFormat('d/m/Y', $value);

        $this->attributes['DoB'] = $date->format('Y-m-d H:i:s');

    }

    public function getDoBAttribute($value)
    {
        return date('d/m/Y',strtotime($value));
    }

    public function getEmailAttribute()
    {
        $res = DB::select("select email from users where id = ".$this->id);

        $data = $res[0]->email;

        return $data;
    }

    public function getOwnReferralCodeAttribute()
    {
        $res = DB::select("select own_referral_code from users where id = ".$this->id);

        $data = $res[0]->own_referral_code;

        return $data;
    }
    /**
     * @return false
     */
    public function getNtaAttribute()
    {
        return false;
    }
    /**
     * @return string
     */
    public function getUserTypeAttribute()
    {
        return 'purchaser';
    }
}
