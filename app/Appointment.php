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
    protected $fillable = ['booking_id','date_start','date_end','amount_for_purchaser','amount_for_carer','status_id','carer_status_id','carer_status_date','purchaser_status_id','purchaser_status_date', 'time_from', 'time_to', 'periodicity', 'price_for_purchaser', 'price_for_carer', 'batch', 'payout'];

    public function getFormattedDateStartAttribute()
    {
        return date('d/m/Y', strtotime($this->date_start));
    }

//    public function getDateEndAttribute($value)
//    {
//        return date('d/m/Y',strtotime($value));
//    }

    //relation
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

    //Accessors
    public function getHoursAttribute(){
        $timeFrom = (float)$this->time_from;
        $timeTo = (float)$this->time_to;

        $hours = 0;

        switch($this->periodicity){
            case 'daily':
            case 'weekly':
            case 'single':
//                $dateStart = Carbon::createFromFormat('d/m/Y', $this->date_start);
//                $dateEnd = Carbon::createFromFormat('d/m/Y', $this->date_end);
//                $days = $dateEnd->diffInDays($dateStart);
                if($timeTo > $timeFrom){
                    $hours = round($timeTo) - round($timeFrom);
                } else {
                    $hours = 24 - round($timeFrom) + round($timeTo);
                }
                break;
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
        $userType = ($user && $user->user_type_id == 3 ? 'CARER' : 'PURCHASER');
        if ($this->isDayHoliday($date)) {
            return constant('self::'.$userType.'_RATE_HOLIDAYS');
        } elseif($this->isHourNight($hour)){
            return constant('self::'.$userType.'_RATE_NIGHT');
        } else {
            return constant('self::'.$userType.'_RATE_DAY');
        }
    }

    private function getCarerHourPrice(int $hour, $date) : float {

        if ($this->isDayHoliday($date)) {
            return constant('self::CARER_RATE_HOLIDAYS');
        } elseif($this->isHourNight($hour)){
            return constant('self::CARER_RATE_NIGHT');
        } else {
            return constant('self::CARER_RATE_DAY');
        }
    }

    private function getPurchaserHourPrice(int $hour, $date) : float {

        if ($this->isDayHoliday($date)) {
            return constant('self::PURCHASER_RATE_HOLIDAYS');
        } elseif($this->isHourNight($hour)){
            return constant('self::PURCHASER_RATE_NIGHT');
        } else {
            return constant('self::PURCHASER_RATE_DAY');
        }
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
