<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CarersProfile extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function Postcode()
    {
        return $this->belongsTo('App\Postcode');
    }

    public function ServicesTypes()
    {
        return $this->belongsToMany('App\ServiceType', 'carer_profile_service_type', 'carer_profile_id', 'service_type_id');
    }

    public function AssistantsTypes()
    {
        return $this->belongsToMany('App\AssistanceType', 'carer_profile_assistance_type', 'carer_profile_id', 'assistance_types_id');
    }

    public function WorkingTimes()
    {
        return $this->belongsToMany('App\WorkingTime', 'carer_profile_working_time', 'carer_profile_id', 'working_times_id');
    }

    public function Languages()
    {
        return $this->belongsToMany('App\Language', 'carer_profile_language', 'carer_profile_id', 'language_id');
    }

    public function CarerReferences()
    {
        return $this->belongsToMany('App\CarerReference', 'carer_profile_reference', 'carer_profile_id', 'reference_id');
    }

    public function CarerWages() //todo why belongsTo?
    {
        return $this->belongsTo('App\CarerWages', 'carer_wages', 'id', 'carer_id');
    }

    public function CarerWage() //todo why belongsTo?
    {
        return $this->hasOne(CarerWages::class, 'carer_id');
    }

    public function profileStatus(){
        return $this->belongsTo('App\UserStatus','profiles_status_id','id');
    }

    public function setDoBAttribute($value)
    {
        $date = DateTime::createFromFormat('d/m/Y', $value);

        $this->attributes['DoB'] = $date->format('Y-m-d H:i:s');

    }

    public function getDoBAttribute($value)
    {
        return date('d/m/Y',strtotime($value));
    }


    public function setDriverLicenceValidUntilAttribute($value)
    {
        $date = DateTime::createFromFormat('d/m/Y', $value);
        $this->attributes['driver_licence_valid_until'] = $date->format('Y-m-d H:i:s');

    }

    public function getDriverLicenceValidUntilAttribute($value)
    {
        return date('d/m/Y',strtotime($value));
    }

    public function setDateCertificateAttribute($value)
    {
        $date = DateTime::createFromFormat('d/m/Y', $value);
        $this->attributes['date_certificate'] = $date->format('Y-m-d H:i:s');

    }


    /**
     * @param $value
     * @return bool|false|string
     */
    public function getDateCertificateAttribute($value)
    {
        return (!empty($value))?date('d/m/Y',strtotime($value)):false;
    }

    public function setCarInsuranceValidUntilAttribute($value)
    {
        $date = DateTime::createFromFormat('d/m/Y', $value);
        $this->attributes['car_insurance_valid_until'] = $date->format('Y-m-d H:i:s');

    }

    public function getCarInsuranceValidUntilAttribute($value)
    {
        return date('d/m/Y',strtotime($value));
    }

    public function setDbsDateAttribute($value)
    {

        //dd($value);

        $date = DateTime::createFromFormat('d/m/Y', $value);
        if($date)
            $this->attributes['dbs_date'] = $date->format('Y-m-d H:i:s');
        else
            $this->attributes['dbs_date'] = null;

    }
    public function getDbsDateAttribute($value)
    {
        return date('d/m/Y',strtotime($value));
    }

    public function getRateAttribute()
    {
        $res = DB::SELECT('SELECT
                      CEILING(AVG(o.punctuality)) as avg_punctuality,
                      CEILING(AVG(o.friendliness)) as avg_friendliness,
                      CEILING(AVG(o.communication)) as avg_communication,
                      CEILING(AVG(o.performance)) as avg_performance,
                      CEILING(((AVG(o.punctuality) + AVG(o.friendliness) + AVG(o.communication) + AVG(o.performance)) /4)) as avg_total
                    FROM booking_overviews o
                    LEFT JOIN bookings b  ON o.booking_id = b.id
                    LEFT JOIN users c ON b.carer_id = c.id
                    WHERE c.id = '.$this->id.' AND o.accept = 1');
        $data = $res[0];
        return $data;
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking','carer_id','id');
    }

    public function carerReviews()
    {
        return  DB::select("SELECT sup.`id`, sup.`first_name`, sup.`family_name`, sup.`town`,`comment`, 
(`punctuality`+`friendliness`+`booking_overviews`.`communication`+`performance`)/4 as raiting,DATE_FORMAT(`booking_overviews`.`created_at`, '%m/%d/%Y') as created_at
FROM `bookings`
INNER JOIN `booking_overviews` ON `booking_id`= `bookings`.`id`
INNER JOIN `service_users_profiles` as sup ON `bookings`.`service_user_id`= sup.`id`
WHERE `carer_id` = ".$this->id." and accept = 1 order by `booking_overviews`.`created_at` desc LIMIT 0,4");

    }

    public function getEmailAttribute()
    {
        $res = DB::select("select email from users where id = ".$this->id);

        $data = $res[0]->email??'';

        return $data;
    }

    public function getOwnReferralCodeAttribute()
    {
        $res = DB::select("select own_referral_code from users where id = ".$this->id);

        $data = $res[0]->own_referral_code??'';

        return $data;
    }


    /**
     * @return false
     */
    public function getNtaAttribute()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getUserTypeAttribute()
    {
        return 'carer';
    }

    public function getShortNameAttribute()
    {
        return $this->first_name.' '.$this->family_name[0].'.';
    }
    
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->family_name;
    }

    //Wages (carer gets)
    public function getWageAttribute(){
        if($this->CarerWage)
            return $this->CarerWage->hour_rate;
        return 10;
    }
    public function getNightWageAttribute(){
        if($this->CarerWage)
            return $this->CarerWage->hour_rate * 1.2;
        return 10 * 1.2;
    }
    public function getHolidayWageAttribute(){
        if($this->CarerWage)
            return $this->CarerWage->hour_rate * 1.5;
        return 10 * 1.2;
    }

    //prices (purchaser pay)
    public function getPriceAttribute(){
        $fee = Fees::find(1);
        if($fee){
            return $fee->carer_rate + $fee->amount;
        }

        return 12;
    }
    public function getNightPriceAttribute(){
        $fee = Fees::find(2);
        if($fee){
            return $fee->carer_rate + $fee->amount;
        }

        return 14.4;
    }
    public function getHolidayPriceAttribute(){
        $fee = Fees::find(3);
        if($fee){
            return $fee->carer_rate + $fee->amount;
        }

        return 18;
    }
}


