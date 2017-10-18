<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    public function ServicesUserProfiles()
    {
        return $this->hasMany('App\ServiceUsersProfile');
    }
}
