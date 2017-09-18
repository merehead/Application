<?php

namespace App\Http\Controllers;

use App\AssistanceType;
use App\Language;
use App\ServiceUsersProfile;
use App\WorkingTime;
use Illuminate\Http\Request;

class ServiceUserPrivateProfileController extends FrontController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index($serviceUserProfile)
    {


        //dd($serviceUserProfile);

        $this->template = config('settings.frontTheme') . '.templates.serviceUserPrivateProfileTemplate';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        if (!$this->user) {
            abort(404);
        } else {

            $serviceUsersProfile = ServiceUsersProfile::findOrFail($serviceUserProfile);


            $this->vars = array_add($this->vars, 'user', $this->user);

            $this->vars = array_add($this->vars, 'serviceUsersProfile', $serviceUsersProfile);

            $typeCare = AssistanceType::all();
            $this->vars = array_add($this->vars, 'typeCare', $typeCare);
            $workingTimes = WorkingTime::all();
            $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
            $languages = Language::all();
            $this->vars = array_add($this->vars, 'languages', $languages);
            //dd($this->user,$carerProfile);
            $this->content = view(config('settings.frontTheme') . '.serviceUserProfiles.PrivateProfile')->with($this->vars)->render();

        }

        return $this->renderOutput();
    }

    public function profile($serviceUserProfile)
    {


        //dd($serviceUserProfile);

        $this->template = config('settings.frontTheme') . '.templates.serviceUserPrivateProfileTemplate';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        if (!$this->user) {
            abort(404);
        } else {

            $serviceUsersProfile = ServiceUsersProfile::findOrFail($serviceUserProfile);


            $this->vars = array_add($this->vars, 'user', $this->user);

            $this->vars = array_add($this->vars, 'carerProfile', $serviceUsersProfile);

            $typeCare = AssistanceType::all();
            $this->vars = array_add($this->vars, 'typeCare', $typeCare);
            $workingTimes = WorkingTime::all();
            $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
            $languages = Language::all();
            $this->vars = array_add($this->vars, 'languages', $languages);
            //dd($this->user,$carerProfile);
            $this->content = view(config('settings.frontTheme') . '.serviceUserProfiles.PublicProfile')->with($this->vars)->render();

        }

        return $this->renderOutput();
    }
}
