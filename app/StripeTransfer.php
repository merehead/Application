<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StripeTransfer extends Model
{
    protected $fillable = [
        'id',
        'connected_account_id',
        'amount',
    ];
}
