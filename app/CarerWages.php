<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarerWages extends Model
{


    public function CarersProfile()
    {
        return $this->belongsToMany('App\CarersProfile', 'carers_profiles', 'id', 'carer_id');
    }
}
