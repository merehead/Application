<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisputePayment extends Model
{
    protected $fillable = ['name'];

    public function appointment()
    {
        return $this->hasOne('App\Appointment','appointment_id','id');
    }
}
