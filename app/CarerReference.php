<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarerReference extends Model
{

    protected $table = 'carers_references';

    public function CarersProfiles()
    {
        return $this->belongsToMany('App\CarersProfile', 'carer_profile_reference', 'reference_id', 'carer_profile_id');
    }
}
