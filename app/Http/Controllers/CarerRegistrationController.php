<?php

namespace App\Http\Controllers;

use App\AssistanceType;
use App\CarersProfile;
use App\Postcode;
use App\ServiceType;
use App\WorkingTime;
use Illuminate\Http\Request;

class CarerRegistrationController extends Controller
{
    public function index(){

        $carerProfile = CarersProfile::find(1);

        $assType = WorkingTime::find(12);
        dd($assType->CarersProfiles);

        dd($carerProfile->WorkingTimes);

        return 'CarerRegistrationController';
    }
}
