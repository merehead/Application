<?php

namespace App\Http\Controllers;

use App\AssistanceType;
use App\CarersProfile;
use App\Http\Controllers\Repo\CarerRegistration;
use App\Http\Requests\CarerRegistrationRequest;
use App\Language;
use App\Postcode;
use App\ServiceType;
use App\WorkingTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarerRegistrationController extends FrontController
{

    private $carersProfile;

    public function __construct(CarerRegistration $carersProfile) {
        parent::__construct();
        $this->carersProfile = $carersProfile;

        $this->template = config('settings.frontTheme').'.templates.userRegistration';
    }

    public function index($stepback=null){

        $this->title = 'Carer Registration';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        $user = Auth::user();

        //dd('CarerRegistrationController index' , $user);


        if (!$user) {
            $step = view(config('settings.frontTheme').'.carerRegistration.Step1_carerRegistration')->with($this->vars)->render();
            $this->vars = array_add($this->vars,'activeStep',1);
        }
        else {

            //dd($this->user, $this->carersProfile->getID(),$this->carersProfile->getNextStep());
            $carersProfile = CarersProfile::find($user->id);

            if(!$carersProfile) {
                return redirect('/');
            }


            //dd($carersProfile->registration_progress);

            if($carersProfile->registration_progress=='20') {
                return redirect('/carer-settings');
            }


            $this->vars = array_add($this->vars, 'carersProfileID', $this->carersProfile->getID());
            $this->vars = array_add($this->vars, 'carersProfile', $carersProfile);

            if ($this->carersProfile->getNextStep($stepback) == 'Step4_carerRegistration') {
                $postcodes = Postcode::all()->pluck('name', 'id')->toArray();
                $this->vars = array_add($this->vars, 'user', $this->user);
                $this->vars = array_add($this->vars, 'postcodes', $postcodes);
            }
            if ($this->carersProfile->getNextStep($stepback) == 'Step9_carerRegistration') {
                $serviceTypes = ServiceType::all();
                $this->vars = array_add($this->vars, 'serviceTypes', $serviceTypes);
            }
            if ($this->carersProfile->getNextStep($stepback) == 'Step10_carerRegistration') {
                $assistanceTypes = AssistanceType::all();
                $this->vars = array_add($this->vars, 'assistanceTypes', $assistanceTypes);
            }
            if ($this->carersProfile->getNextStep($stepback) == 'Step11_carerRegistration') {
                $workingTimes = WorkingTime::all();
                $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
            }
            if ($this->carersProfile->getNextStep($stepback) == 'Step13_carerRegistration') {
                $languages = Language::all();
                $this->vars = array_add($this->vars, 'languages', $languages);
            }

/*            if ($this->carersProfile->getNextStep($stepback) == 'Step13_carerRegistration') {
                $languages = Language::all();
                $this->vars = array_add($this->vars, 'languages', $languages);
            }*/

            $this->vars = array_add($this->vars,'activeStep',$this->carersProfile->getActiveStep($user->id));

            $step = view(config('settings.frontTheme').'.carerRegistration.'.$this->carersProfile->getNextStep($stepback))->with($this->vars)->render();
        }
        //dd($assistanceTypes);

        $this->vars = array_add($this->vars,'step',$step);

        $this->content = view(config('settings.frontTheme').'.carerRegistration.carerRegistration')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function update(Request $request) {

//dd($request->all());

        if ($request->has('stepback')) {

            $stepback = $request->stepback;

            $carerProfiles = CarersProfile::findOrFail($request->input('carersProfileID'));

            if($stepback == '4' && $carerProfiles->criminal_conviction == 'Some' && $carerProfiles->registration_progress !='5')
                $stepback = '5';


            //dd($request->all(),$carerProfiles,$stepback);

            $carerProfiles->registration_progress = $stepback;

            $carerProfiles->save();

        } else {

            $this->carersProfile->saveStep($request);
        }


        return redirect('/carer-registration');

    }

    public function sendContinueRegistration(){


        $this->title = 'Carer Registration';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        $user = Auth::user();


        $this->content = view(config('settings.frontTheme').'.carerRegistration.thankYou')->render();

        return $this->renderOutput();
    }

}
