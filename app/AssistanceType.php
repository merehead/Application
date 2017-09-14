<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssistanceType extends Model
{
    public function CarersProfiles()
    {
        return $this->belongsToMany('App\CarersProfile', 'carer_profile_assistance_type', 'assistance_types_id', 'carer_profile_id');
    }

    public function ServiceUsersProfiles()
    {
        return $this->belongsToMany('App\ServiceUsersProfile', 'service_user_profile_service_type', 'assistance_types_id', 'service_user_profile_id');
    }
}

