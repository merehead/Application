<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Repo\ServiceUserRegistration;
use App\ServiceUsersProfile;
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


        $this->vars = array_add($this->vars, 'serviceUserProfileID', $serviceUserProfileId);
        $this->vars = array_add($this->vars, 'serviceUserProfile', $serviceUserProfile);

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

