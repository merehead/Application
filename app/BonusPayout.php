<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusPayout extends Model
{
    protected $fillable = [
        'bonus_type_id',
        'user_id',
        'referral_user_id',
        'amount',
        'payout',
    ];

    /**
     * Relations
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
