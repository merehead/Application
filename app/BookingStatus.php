<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    protected $fillable = ['name'];

    public function bookings()
    {
        return $this->hasMany('App\Booking','status_id','id');
    }
}
