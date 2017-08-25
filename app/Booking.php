<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['purchaser_id','service_user_id','carer_id','date_start','date_end','frequency_id','amount_for_purchaser','amount_for_carer','status_id'];

    public function getDateStartAttribute($value)
    {
        return date('d/m/Y',strtotime($value));
    }
    public function getDateEndAttribute($value)
    {
        return date('d/m/Y',strtotime($value));
    }


    //relation

    public function bookingPurchaser()
    {
        return $this->belongsTo('App\User','purchaser_id','id');
    }
    public function bookingServiceUser()
    {
        return $this->belongsTo('App\User','service_user_id','id');
    }
    public function bookingCarer()
    {
        return $this->belongsTo('App\User','carer_id','id');
    }


    public function frequency()
    {
        return $this->belongsTo('App\BookingAppointmentFrequency');
    }


    public function bookingStatus ()
    {
        return $this->belongsTo('App\BookingStatus','status_id','id');
    }

    public function transaction()
    {
        return $this->belongsTo('App\BookingPayment','id','booking_id');
    }


    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
