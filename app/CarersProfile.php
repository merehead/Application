<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarersProfile extends Model
{
    public function Postcode()
    {
        return $this->belongsTo('App\Postcode');
    }

    public function ServicesTypes()
    {
        return $this->belongsToMany('App\ServiceType', 'carer_profile_service_type', 'carer_profile_id', 'service_type_id');
    }

    public function AssistantsTypes()
    {
        return $this->belongsToMany('App\AssistanceType', 'carer_profile_assistance_type', 'carer_profile_id', 'assistance_types_id');
    }

    public function WorkingTimes()
    {
        return $this->belongsToMany('App\WorkingTime', 'carer_profile_working_time', 'carer_profile_id', 'working_times_id');
    }

    public function Languages()
    {
        return $this->belongsToMany('App\Language', 'carer_profile_language', 'carer_profile_id', 'language_id');
    }

    public function CarerReferences()
    {
        return $this->belongsToMany('App\CarerReference', 'carer_profile_reference', 'carer_profile_id', 'reference_id');
    }
}
