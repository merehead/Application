<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusesPayment extends Model
{
    protected $fillable = [
        'user_id',
        'bonus_type_id',
        'amount',
        'referral_donor',
    ];
}
