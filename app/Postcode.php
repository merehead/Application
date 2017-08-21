<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postcode extends Model
{
    public function CarersProfiles()
    {
        return $this->hasMany('App\CarersProfile');
    }
}
