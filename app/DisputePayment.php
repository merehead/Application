<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisputePayment extends Model
{
    protected $fillable = ['name','css_name','appointment_id','amount'];

    public function appointment()
    {
        return $this->hasOne('App\Appointment','appointment_id','id');
    }
}
