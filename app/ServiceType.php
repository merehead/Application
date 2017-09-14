<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    public function CarersProfiles()
    {
        return $this->belongsToMany('App\CarersProfile', 'carer_profile_service_type', 'service_type_id', 'carer_profile_id');
    }

    public function ServiceUsersProfiles()
    {
        return $this->belongsToMany('App\ServiceUsersProfile', 'service_user_profile_service_type', 'service_type_id', 'service_user_profile_id');
    }

}
