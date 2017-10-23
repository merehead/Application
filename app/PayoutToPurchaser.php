<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayoutToPurchaser extends Model
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
        return $this->belongsTo(Booking::class);
    }
}
