<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class PurchasersProfile extends Model
{

    public function serviceUsers()
    {
        return $this->hasMany('App\ServiceUsersProfile','purchaser_id','id');
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
}
