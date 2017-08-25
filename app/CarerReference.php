<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarerReference extends Model
{
    public function CarersProfiles()
    {
        return $this->belongsToMany('App\CarersProfile', 'carer_profile_reference', 'working_times_id', 'reference_id');
    }
}
