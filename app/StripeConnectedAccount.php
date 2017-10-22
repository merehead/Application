<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StripeConnectedAccount extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'id',
        'carer_id',
    ];
}
