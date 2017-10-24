<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusTransaction extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'comment',
    ];
}
