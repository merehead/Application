<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['booking_id','date_start','date_end','amount_for_purchaser','amount_for_carer','status_id','carer_status_id','carer_status_date','purchaser_status_id','purchaser_status_date'];

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

    public function disputePayment()
    {
        return $this->belongsTo('App\DisputePayment');
    }

    public function transaction()
    {
        return $this->belongsTo('App\AppointmentPayment','id','appointment_id');
    }

    public function appointmentStatus ()
    {
        return $this->belongsTo('App\AppointmentStatus','status_id','id');
    }
    public function appointmentStatusCarer ()
    {
        return $this->belongsTo('App\AppointmentUserStatus','carer_status_id','id');
    }
    public function appointmentStatusPurchaser ()
    {
        return $this->belongsTo('App\AppointmentUserStatus','purchaser_status_id','id');
    }
}
