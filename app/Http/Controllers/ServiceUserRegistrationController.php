<?php

namespace App\Http\Controllers;

use App\AssistanceType;
use App\Floor;
use App\Http\Controllers\Repo\ServiceUserRegistration;
use App\ServiceType;
use App\ServiceUserCondition;
use App\ServiceUsersProfile;
use App\WorkingTime;
use Illuminate\Http\Request;

//use Illuminate\Http\Request;

class ServiceUserRegistrationController extends FrontController
{
    private $serviceUserProfile;

    public function __construct(ServiceUserRegistration $serviceUserProfile) {
        parent::__construct();
        $this->serviceUserProfile = $serviceUserProfile;

        $this->template = config('settings.frontTheme').'.templates.userRegistration';
    }

    public function index($serviceUserProfileId){

        $serviceUserProfile = ServiceUsersProfile::findOrFail($serviceUserProfileId);

        if ($serviceUserProfile->purchaser_id != $this->user->id)
        abort('404');

        $this->title = 'Service User Registration';

        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);

        $this->vars = array_add($this->vars, 'userNameForSite', $serviceUserProfile->like_name);


        $this->vars = array_add($this->vars, 'serviceUserProfileID', $serviceUserProfileId);
        $this->vars = array_add($this->vars, 'serviceUserProfile', $serviceUserProfile);

        if ($this->serviceUserProfile->getNextStep($serviceUserProfileId) == 'Step5_serviceUserRegistration') {
            $serviceTypes = ServiceType::all();
            $this->vars = array_add($this->vars, 'serviceTypes', $serviceTypes);
        }
        if ($this->serviceUserProfile->getNextStep($serviceUserProfileId) == 'Step5_1_serviceUserRegistration') {
            $assistanceTypes = AssistanceType::all();
            $this->vars = array_add($this->vars, 'assistanceTypes', $assistanceTypes);
        }
        if ($this->serviceUserProfile->getNextStep($serviceUserProfileId) == 'Step6_serviceUserRegistration') {
            $workingTimes = WorkingTime::all();
            $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
        }
        if ($this->serviceUserProfile->getNextStep($serviceUserProfileId) == 'Step9_1_serviceUserRegistration') {
            $floors = Floor::all()->pluck('name', 'id')->toArray();
            $this->vars = array_add($this->vars, 'floors', $floors);
        }

        if ($this->serviceUserProfile->getNextStep($serviceUserProfileId) == 'Step17_serviceUserRegistration') {
            $serviceUserConditions = ServiceUserCondition::all();
            $this->vars = array_add($this->vars, 'serviceUserConditions', $serviceUserConditions);
        }


        //dd($this->serviceUserProfile->getNextStep($serviceUserProfileId));

        $this->vars = array_add($this->vars,'activeStep',$this->serviceUserProfile->getActiveStep($serviceUserProfileId));
        $this->vars = array_add($this->vars,'activeSubStep',$this->serviceUserProfile->getActiveSubStep($serviceUserProfileId));

        $step = view(config('settings.frontTheme').'.serviceUserRegistration.'.$this->serviceUserProfile->getNextStep($serviceUserProfileId))->with($this->vars)->render();


        $this->vars = array_add($this->vars,'step',$step);

        $this->content = view(config('settings.frontTheme') . '.purchaserRegistration.purchaserRegistration')->with($this->vars)->render();

        return $this->renderOutput();

    }

    public function update(Request $request, $serviceUserProfileId){

        $serviceUserProfile = ServiceUsersProfile::findorfail($serviceUserProfileId);

        //dd($request->all());

        if ($serviceUserProfile->purchaser_id != $this->user->id)
            abort('404');

        if ($request->has('stepback')) {
            //dd($request->all());

            $stepback = $request->stepback;

            $serviceUserProfile = ServiceUsersProfile::findOrFail($serviceUserProfileId);

            $serviceUserProfile->registration_progress = $request->input('stepback');

            $serviceUserProfile->save();

        } else {

            $this->serviceUserProfile->saveStep($request);
        }
        return redirect('/service-registration/'.$serviceUserProfileId);
    }
}

