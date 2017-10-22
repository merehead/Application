<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StripeTransfer extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'id',
        'booking_id',
        'connected_account_id',
        'amount',
    ];

    /**
     * Relations
     */
    public function booking(){
        return $this->belongsTo(Booking::class);
    }
}
