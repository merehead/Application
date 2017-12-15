<?php

namespace App;

use App\Interfaces\Constants;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;
use App\Holiday;
use DB;

class Appointment extends Model implements Constants
{
    protected $fillable = ['booking_id','date_start','date_end','amount_for_purchaser','amount_for_carer','status_id','carer_status_id','carer_status_date','purchaser_status_id','purchaser_status_date', 'time_from', 'time_to', 'periodicity', 'price_for_purchaser', 'price_for_carer', 'batch', 'payout', 'reminder_sent'];

    /**
     * Relations
     */
    public function assistance_types()
    {
        return $this->belongsToMany('App\AssistanceType', 'appointments_assistance_types');
    }
    public function booking()
    {
        return $this->belongsTo('App\Booking');
    }
    public function disputePayment()
    {
        return $this->belongsTo('App\DisputePayment','id','appointment_id');
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

    /**
     * Accessors
     */
    public function getAssistanceTypesTextAttribute(){

        return implode(', ', array_pluck($this->assistance_types, 'name'));
    }
    
    public function getFormattedDateStartAttribute()
    {
        return date('d/m/Y', strtotime($this->date_start));
    }

    public function getHoursAttribute(){
        $timeFrom = (float)$this->time_from;
        $timeTo = (float)$this->time_to;

        $hours = 0;

        if($timeTo > $timeFrom){
            $hours = round($timeTo) - round($timeFrom);
        } else {
            $hours = 24 - round($timeFrom) + round($timeTo);
        }

        return $hours;
    }

    public function getPriceAttribute(){
        $price = 0;
        $timeFrom = round($this->time_from);
        $timeTo = round($this->time_to);
        if($timeTo > $timeFrom){
            for($i = $timeFrom; $i < $timeTo; $i++){
                $price += $this->getHourPrice($i, $this->date_start);
            }
        } else {
            for($i = $timeFrom; $i < 24; $i++){
                $price += $this->getHourPrice($i, $this->date_start);
            }
            for($i = 0; $i < $timeTo; $i++){
                $price += $this->getHourPrice($i, $this->date_start);
            }
        }
        return $price;
    }

    public function getCarerPriceAttribute(){
        if($this->price_for_carer)
            return $this->price_for_carer;
        $price = 0;
        $timeFrom = round($this->time_from);
        $timeTo = round($this->time_to);
        if($timeTo > $timeFrom){
            for($i = $timeFrom; $i < $timeTo; $i++){
                $price += $this->getCarerHourPrice($i, $this->date_start);
            }
        } else {
            for($i = $timeFrom; $i < 24; $i++){
                $price += $this->getCarerHourPrice($i, $this->date_start);
            }
            for($i = 0; $i < $timeTo; $i++){
                $price += $this->getCarerHourPrice($i, $this->date_start);
            }
        }
        return $price;
    }

    public function getPurchaserPriceAttribute(){
        if($this->price_for_purchaser)
            return $this->price_for_purchaser;

        $price = 0;
        $timeFrom = round($this->time_from);
        $timeTo = round($this->time_to);
        if($timeTo > $timeFrom){
            for($i = $timeFrom; $i < $timeTo; $i++){
                $price += $this->getPurchaserHourPrice($i, $this->date_start);
            }
        } else {
            for($i = $timeFrom; $i < 24; $i++){
                $price += $this->getPurchaserHourPrice($i, $this->date_start);
            }
            for($i = 0; $i < $timeTo; $i++){
                $price += $this->getPurchaserHourPrice($i, $this->date_start);
            }
        }
        return $price;
    }

    private function getHourPrice(int $hour, $date) : float {
        $user = Auth::user();
        $carerProfile = $this->booking->bookingCarerProfile;
        if($user && $user->user_type_id == 3){
            if ($this->isDayHoliday($date)) {
                return $carerProfile->holiday_wage;
            } elseif($this->isHourNight($hour)){
                return $carerProfile->holiday_wage;
            } else {
                return $carerProfile->wage;
            }
        } else {
            if ($this->isDayHoliday($date)) {
                return isset($carerProfile->holiday_price)?$carerProfile->holiday_price:0;
            } elseif($this->isHourNight($hour)){
                return isset($carerProfile->night_price)?$carerProfile->night_price:0;
            } else {
               return isset($carerProfile->price)?$carerProfile->price:0;
            }
        }
    }

    private function getCarerHourPrice(int $hour, $date) : float {
        $carerProfile = $this->booking->bookingCarerProfile;
        if ($this->isDayHoliday($date)) {
            return $carerProfile->holiday_wage;
        } elseif($this->isHourNight($hour)){
            return $carerProfile->night_wage;
        } else {
            return $carerProfile->wage;
        }
    }


    private function getPurchaserHourPrice(int $hour, $date) : float {
        $carerProfile = $this->booking->bookingCarerProfile;
        if ($this->isDayHoliday($date)) {
            return $carerProfile->holiday_price;
        } elseif($this->isHourNight($hour)){
            return $carerProfile->night_price;
        } else {
            return $carerProfile->price;
        }
    }


    public function getCancelableAttribute(){
        return (\Carbon\Carbon::parse(date("Y-m-d ", strtotime($this->date_start)).' '.$this->time_from)->diffInHours() > 24 && !$this->is_past);
    }

    public function getIsPastAttribute(){
        return \Carbon\Carbon::parse(date("Y-m-d ", strtotime($this->date_start)).' '.$this->time_from)->isPast();
    }

    public function getFormattedTimeFromAttribute(){
       return date("h:i A", strtotime(str_replace('.', ':', $this->time_from)));
    }

    public function getFormattedTimeToAttribute(){
        return date("h:i A", strtotime(str_replace('.', ':', $this->time_to)));
    }

    private function isHourNight(int $hour){
        $nightHours = ['from' => 20, 'to' => 8];
        return $hour >= $nightHours['from'] || $hour <= $nightHours['to'];
    } 

    private function isDayHoliday($date){
        $dt = Carbon::parse($date);
        $sql = 'SELECT * FROM holidays WHERE  date >= \''.$dt->format("Y-m-d").'\' AND date < \''.$dt->addDays(1)->format("Y-m-d").'\'';
        $res = DB::select($sql);

        return $dt->dayOfWeek == 1  || count($res) > 0;
    }
}
