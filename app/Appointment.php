<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
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
    public function booking()
    {
        return $this->belongsTo('App\Booking');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }

    public function appointmentStatus ()
    {
        return $this->belongsTo('App\Booking_appointment_status','status_id','id');
    }
    public function appointmentStatusCarer ()
    {
        return $this->belongsTo('App\Booking_appointment_status','carer_status_id','id');
    }
    public function appointmentStatusPurchaser ()
    {
        return $this->belongsTo('App\Booking_appointment_status','purchaser_status_id','id');
    }
}
