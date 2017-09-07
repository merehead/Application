<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class ServiceUsersProfile extends Model
{

    public function ServicesTypes()
    {
        return $this->belongsToMany('App\ServiceType', 'service_user_profile_service_type', 'service_user_profile_id', 'service_type_id');
    }

    public function AssistantsTypes()
    {
        return $this->belongsToMany('App\AssistanceType', 'service_user_profile_assistance_type', 'service_user_profile_id', 'assistance_types_id');
    }

    public function WorkingTimes()
    {
        return $this->belongsToMany('App\WorkingTime', 'service_user_profile_working_time', 'service_user_profile_id', 'working_times_id');
    }

    public function Floor()
    {
        return $this->belongsTo('App\Floor');
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

    public function setStartDateAttribute($value)
    {
        $date = DateTime::createFromFormat('d/m/Y', $value);

        $this->attributes['start_date'] = $date->format('Y-m-d H:i:s');

    }

    public function getStartDateAttribute($value)
    {
        return date('d/m/Y',strtotime($value));
    }
}
