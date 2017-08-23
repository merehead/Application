<?php

namespace App\Http\Controllers;

use App\AssistanceType;
use App\Http\Controllers\Repo\CarerRegistration;
use App\Language;
use App\Postcode;
use App\ServiceType;
use App\WorkingTime;
use Illuminate\Http\Request;

class CarerRegistrationController extends FrontController
{

    private $carersProfile;

    public function __construct(CarerRegistration $carersProfile) {
        parent::__construct();
        $this->carersProfile = $carersProfile;

        $this->template = config('settings.frontTheme').'.templates.userRegistration';
    }



    public function index(){

        $this->title = 'Carer Registration';


        //dd($this->carersProfile->getNextStep());


        $this->vars = array_add($this->vars,'carersProfileID',$this->carersProfile->getID());

        if($this->carersProfile->getNextStep()=='Step4_carerRegistration'){
            $postcodes = Postcode::all()->pluck('name','id')->toArray();
            $this->vars = array_add($this->vars,'postcodes',$postcodes);
        }

        if($this->carersProfile->getNextStep()=='Step9_carerRegistration'){
            $serviceTypes = ServiceType::all();
            $this->vars = array_add($this->vars,'serviceTypes',$serviceTypes);
        }
        if($this->carersProfile->getNextStep()=='Step10_carerRegistration'){
            $assistanceTypes = AssistanceType::all();
            $this->vars = array_add($this->vars,'assistanceTypes',$assistanceTypes);
        }
        if($this->carersProfile->getNextStep()=='Step11_carerRegistration'){
            $workingTimes = WorkingTime::all();
            $this->vars = array_add($this->vars,'workingTimes',$workingTimes);
        }
        if($this->carersProfile->getNextStep()=='Step13_carerRegistration'){
            $languages = Language::all();
            $this->vars = array_add($this->vars,'languages',$languages);
        }

        if($this->carersProfile->getNextStep()=='Step13_carerRegistration'){
            $languages = Language::all();
            $this->vars = array_add($this->vars,'languages',$languages);
        }
        //dd($assistanceTypes);


        $step = view(config('settings.frontTheme').'.carerRegistration.'.$this->carersProfile->getNextStep())->with($this->vars)->render();
        $this->vars = array_add($this->vars,'step',$step);

        $this->content = view(config('settings.frontTheme').'.carerRegistration.carerRegistration')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function update(Request $request) {

        //dd($request->all());

        $this->carersProfile->saveStep($request);

        return redirect('/carer-registration');

    }

}
