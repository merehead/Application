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
}
