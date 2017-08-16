<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingPayment extends Model
{
    public function booking()
    {
        return $this->hasOne('App\Booking','id','booking_id');
    }
}
