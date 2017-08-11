<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking_appointment_frequency extends Model
{
    protected $fillable = ['name'];

    public function bookings()
    {
        return $this->hasMany('App\Booking','frequency_id','id');
    }
}
