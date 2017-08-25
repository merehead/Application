<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentPayment extends Model
{
    public function appointment()
    {
        return $this->hasOne('App\Appointment','id','appointment_id');
    }
}
