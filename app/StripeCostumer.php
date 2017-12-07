<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StripeCostumer extends Model
{
    protected $fillable = [
      'purchaser_id',
      'token',
      'last_four',
    ];
}
