<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarerReference extends Model
{

    protected $table = 'carer_references';

    public function CarersProfiles()
    {
        return $this->belongsToMany('App\CarersProfile', 'carer_profile_reference', 'carer_profile_id', 'reference_id');
    }
}
