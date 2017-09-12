<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function CarersProfiles()
    {
        return $this->belongsToMany('App\CarersProfile', 'carer_profile_language', 'language_id', 'carer_profile_id');
    }

    public function ServicesUserProfiles()
    {
        return $this->belongsToMany('App\ServiceUserProfile', 'service_user_profile_language', 'language_id', 'services_user_profile_id');
    }
}
