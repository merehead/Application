<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StripeConnectedAccount extends Model
{
    protected $fillable = [
        'id',
        'carer_id',
    ];
}
