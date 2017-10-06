<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Booking extends Model
{
    protected $fillable = ['purchaser_id','service_user_id','carer_id','date_start','date_end','frequency_id','amount_for_purchaser','amount_for_carer','status_id', 'carer_status_id', 'purchaser_status_id', 'payment_method'];

    public function getDateStartAttribute()
    {
        return date('d/m/Y', strtotime($this->appointments()->orderBy('date_start')->get()->first()->date_start));
    }
    public function getDateEndAttribute()
    {
        return date('d/m/Y', strtotime($this->appointments()->orderByDesc('date_start')->get()->first()->date_start));
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

    public function overviews(){
        return $this->hasMany(BookingOverview::class, 'booking_id');
    }

    public function bookingReview()
    {
        return $this->hasMany('App\BookingOverview');
    }

    //Accessors
    public function getCarerRateAttribute(){
        return 10;
    }

    public function getPurchaserRateAttribute(){
        return 13;
    }
 
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

    public function getPriceAttribute(){
        $price = 0;
        $appointments = $this->appointments()->get();
        foreach ($appointments as $appointment)
            $price += $appointment->price;

        return round($price, 2);
    }

    public function getCarerAmountAttribute(){
        return $this->hours * $this->purchaser_rate;
    }

    public function getDateFromAttribute(){
        if($this->appointments()->get()->count())
            return $this->appointments()->orderBy('date_start')->get()->first()->date_start;
    }



    public function getHasActiveAppointmentsAttribute(){
        return $this->appointments()->whereIn('status_id', [1, 2, 3])->get()->count() > 0;
    }
}
