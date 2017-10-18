<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class ServiceUsersProfile extends Model
{

    public function ServicesTypes()
    {
        return $this->belongsToMany('App\ServiceType', 'service_user_profile_service_type', 'service_user_profile_id', 'service_type_id');
    }

    public function AssistantsTypes()
    {
        return $this->belongsToMany('App\AssistanceType', 'service_user_profile_assistance_type', 'service_user_profile_id', 'assistance_types_id');
    }

    public function WorkingTimes()
    {
        return $this->belongsToMany('App\WorkingTime', 'service_user_profile_working_time', 'service_user_profile_id', 'working_times_id');
    }

    public function Floor()
    {
        return $this->belongsTo('App\Floor');
    }

    public function ServiceUserConditions()
    {
        return $this->belongsToMany('App\ServiceUserCondition', 'servUserProfile_servUserCondition', 'service_user_profile_id', 'service_user_conditions_id');
    }
    public function Languages()
    {
        return $this->belongsToMany('App\Language', 'service_user_profile_language', 'services_user_profile_id', 'language_id');
    }

    public function Behaviours()
    {
        return $this->belongsToMany('App\Behaviour', 'service_user_profile_behaviour', 'services_user_profile_id', 'behaviour_id');
    }

    public function Bookings()
    {
        return $this->hasMany('App\Booking', 'service_user_id');
    }

    public function setDoBAttribute($value)
    {
        $date = DateTime::createFromFormat('d/m/Y', $value);

        $this->attributes['DoB'] = $date->format('Y-m-d H:i:s');

    }

    public function profileStatus(){
        return $this->belongsTo('App\UserStatus','profiles_status_id','id');
    }
    public function getDoBAttribute($value)
    {
        return date('d/m/Y',strtotime($value));
    }

    public function setStartDateAttribute($value)
    {
        $date = DateTime::createFromFormat('d/m/Y', $value);

        $this->attributes['start_date'] = $date->format('Y-m-d H:i:s');

    }

    public function getStartDateAttribute($value)
    {
        return date('d/m/Y',strtotime($value));
    }


    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->family_name;
    }

    public function getProfileLinkAttribute(){
        return '/serviceUser/profile/'.$this->id;
    }


    public function isDeleted()
    {
        if ($this->deleted == 'Yes') {
            return true;
        }
        return false;
    }


    /**
     * @return false|integer
     */
    public function getNtaAttribute()
    {
        // Would the service user like someone to visit regularly for companionship?    visit_for_companionship
        //medication / treatments                                                       TYPE OF CARE NEEDED medication / treatments
        // start                                                                        start_date
        // Require assistance with eating / drinking                                    assistance_with_eating
        //Needs help in choosing incontinence products                                  choosing_incontinence_products
        //Behaviour                                                                     Behaviour
        //Has a doctor's note or court order                                            consent
        //time would they like someone                                                   time_to_bed
        //Needs assistance keeping safe at night                                        keeping_safe_at_night
        //Needs the assistance of more than one person at a time                        multiple_carers
        //Are there any other medical conditions,                                       we_missed

        //if ($this->id) dd($this);

        $nta = array();

        if($this->visit_for_companionship == 'Yes')
            $nta['Would the service user like someone to visit regularly for companionship?'] = $this->visit_for_companionship;

        if($this->assistance_in_medication == 'Yes' || $this->assistance_in_medication == 'Sometimes')
            $nta['REQUIRES ASSISTANCE IN TAKING MEDICATION TREATMENTS'] = $this->in_medication_detail;




        if($this->start_date != '01/01/1970')
            $nta['Date of start'] = $this->start_date;
        if($this->assistance_with_eating == 'Yes')
            $nta['Require assistance with eating / drinking'] = $this->assistance_with_eating_detail;
        if($this->choosing_incontinence_products == 'Yes')
            $nta['Needs help in choosing incontinence products'] = $this->choosing_incontinence_products;
//behaviour
        if($this->consent == 'Yes')
            $nta['doctors_note'] = $this->consent_details;
        if( strlen($this->time_to_bed))
            $nta['Time would they like someone'] = $this->time_to_bed;
        if($this->keeping_safe_at_night == 'Yes' || $this->keeping_safe_at_night == 'Sometimes')
            $nta['Needs assistance keeping safe at night'] = $this->keeping_safe_at_night_details;
        if($this->multiple_carers == 'Yes')
            $nta['Needs the assistance of more than one person at a time'] = $this->multiple_carers_details;
        if($this->we_missed == 'Yes')
            $nta['Are there any other medical conditions'] = $this->we_missed_details;


        return $nta;
    }

    /**
     * @return string
     */
    public function getUserTypeAttribute()
    {
        return 'service';
    }
}
