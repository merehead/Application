<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceUserCondition extends Model
{
    public function ServiceUsersProfiles()
    {
        return $this->belongsToMany('App\ServiceUsersProfile', 'servUserProfile_servUserCondition', 'service_user_conditions_id', 'service_user_profile_id');
    }
}
