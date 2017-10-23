<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'booking_id',
        'payment_method',
        'amount',
    ];

    /**
     * Relations
     */
    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
