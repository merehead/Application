<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StripeRefund extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'id',
        'booking_id',
        'amount',
    ];

    /**
     * Relations
     */
    public function booking(){
        return $this->belongsTo(Booking::class);
    }
}
