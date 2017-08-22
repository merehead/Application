<?php

namespace App\Http\Controllers;


use App\CarersProfile;

use Illuminate\Http\Request;

class CarerRegistrationController extends FrontController
{

    private $carersProfile;

    public function __construct(CarersProfile $carersProfile) {
        parent::__construct();
        $this->carersProfile = $carersProfile;

        $this->template = config('settings.frontTheme').'.templates.carerRegistration';
    }



    public function index(){


        $this->title = 'Carer Registration';


        $this->content = view(config('settings.frontTheme').'.bookingsDetails.bookingsDetails')->with($this->vars)->render();


        $carerProfile = CarersProfile::find(1);



        dd($carerProfile);

        return 'CarerRegistrationController';
    }
}
