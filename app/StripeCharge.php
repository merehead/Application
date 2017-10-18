<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StripeCharge extends Model
{
    protected $fillable = [
        'id',
        'booking_id',
        'amount',
    ];
}
