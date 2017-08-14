<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['booking_id','transaction_id','date_start','date_end','amount','status_id','carer_status_id','purchaser_status_id'];

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
        return $this->belongsTo('App\Booking_appointment_frequency');
    }


    public function bookingStatus ()
    {
        return $this->belongsTo('App\Booking_appointment_status','status_id','id');
    }
    public function bookingStatusCarer ()
    {
        return $this->belongsTo('App\Booking_appointment_status','carer_status_id','id');
    }
    public function bookingStatusPurchaser ()
    {
        return $this->belongsTo('App\Booking_appointment_status','purchaser_status_id','id');
    }


    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
