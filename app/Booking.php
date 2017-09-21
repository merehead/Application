<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Booking extends Model
{
    protected $fillable = ['purchaser_id','service_user_id','carer_id','date_start','date_end','frequency_id','amount_for_purchaser','amount_for_carer','status_id', 'payment_method'];

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

//    public function bookingServiceUser()
//    {
//        return $this->belongsTo('App\User','service_user_id','id');
//    }

    public function bookingServiceUser()
    {
        return $this->belongsTo('App\ServiceUsersProfile','service_user_id','id');
    }
    public function bookingCarer()
    {
        return $this->belongsTo('App\User','carer_id','id');
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

    public function assistance_types()
    {
        return $this->belongsToMany('App\AssistanceType', 'bookings_assistance_types');
    }

    //Accessors
    public function getHoursAttribute(){
        $hours = 0;
        $appointments = $this->appointments()->get();
        foreach ($appointments as $appointment)
            $hours += $appointment->hours;

        return $hours;
    }

    public function getHourPriceAttribute(){
        $user = Auth::user();
        if($user->user_type_id == 3)
            return 10;
        else
            return 13;
    }

}
