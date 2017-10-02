<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingOverview extends Model
{
    protected $fillable = [
        'booking_id',
        'punctuality',
        'friendliness',
        'communication',
        'performance',
        'comment',
    ];


    public function booking()
    {
        return $this->belongsTo('App\Booking');
    }


}
