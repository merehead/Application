<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    protected $fillable=['fee_name',
        'carer_rate',
        'type_flat',
        'type_percent',
        'amount',
        'purchaser_rate'];

}
