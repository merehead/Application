<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingsMessage extends Model
{
    protected $fillable = [
      'booking_id',
      'sender',
      'type',
      'new_status',
      'text',
    ];
}
