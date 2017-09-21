<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class CarersProfile extends Model
{
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

}
