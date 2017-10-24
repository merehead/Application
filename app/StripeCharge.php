<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StripeCharge extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'id',
        'booking_id',
        'amount',
        'fee',
    ];
}
