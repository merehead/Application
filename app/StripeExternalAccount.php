<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StripeExternalAccount extends Model
{
    protected $fillable = [
        'id',
        'connected_account_id',
    ];
}
