<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingTime extends Model
{
    public function CarersProfiles()
    {
        return $this->belongsToMany('App\CarersProfile', 'carer_profile_working_time', 'working_times_id', 'carer_profile_id');
    }

    public function ServiceUsersProfiles()
    {
        return $this->belongsToMany('App\ServiceUsersProfile', 'service_user_profile_service_type', 'working_times_id', 'service_user_profile_id');
    }

}
