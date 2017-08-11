<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking_appointment_status extends Model
{
    protected $fillable = ['name'];

    public function statusAppointments()
    {
        return $this->hasMany('App\Appointment','status_id','id');
    }

    public function statusCarerAppointments()
    {
        return $this->hasMany('App\Appointment','carer_status_id','id');
    }

    public function statusPurchaserAppointments()
    {
        return $this->hasMany('App\Appointment','purchaser_status_id','id');
    }

    public function statusBookings()
    {
        return $this->hasMany('App\Booking','status_id','id');
    }

    public function statusCarerBookings()
    {
        return $this->hasMany('App\Booking','carer_status_id','id');
    }

    public function statusPurchaserBookings()
    {
        return $this->hasMany('App\Booking','purchaser_status_id','id');
    }
}


//return $this->hasMany('App\Booking','frequency_id','id');