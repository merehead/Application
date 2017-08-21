<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssistanceType extends Model
{
    public function CarersProfiles()
    {
        return $this->belongsToMany('App\CarersProfile', 'carer_profile_assistance_type', 'assistance_types_id', 'carer_profile_id');
    }
}
