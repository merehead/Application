<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarerWages extends Model
{

    protected $fillable=['carer_id','hour_rate'];

    public function CarersProfile()
    {
        return $this->belongsToMany('App\CarersProfile', 'carers_profiles', 'id', 'carer_id');
    }
}
