<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Behaviour extends Model
{
    public function ServicesUserProfiles()
    {
        return $this->belongsToMany('App\ServiceUserProfile', 'service_user_profile_behaviour', 'behaviour_id', 'services_user_profile_id');
    }
}
