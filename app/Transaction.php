<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'booking_id',
        'payment_type',
        'amount',
        'payment_id',
        'payment_object',
    ];

    /**
     * Relations
     */
    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
