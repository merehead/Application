<?php

namespace App\Http\Controllers;

use App\AssistanceType;
use App\Behaviour;
use App\Floor;
use App\Language;
use App\ServiceType;
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
            $this->vars = array_add($this->vars, 'userNameForSite', $serviceUsersProfile->like_name);

            $typeCare = AssistanceType::all()->sortBy('id');
            $this->vars = array_add($this->vars, 'typeCare', $typeCare);

            $typeService = ServiceType::all()->sortBy('id');
            $this->vars = array_add($this->vars, 'typeService', $typeService);

            $behaviour = Behaviour::all();
            $this->vars = array_add($this->vars, 'behaviour', $behaviour);

            $workingTimes = WorkingTime::all();
            $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
            $languages = Language::all();
            $this->vars = array_add($this->vars, 'languages', $languages);
            $floors = Floor::all()->pluck('name', 'id')->toArray();
            $this->vars = array_add($this->vars, 'floors', $floors);
            $this->content = view(config('settings.frontTheme') . '.serviceUserProfiles.PrivateProfile')->with($this->vars)->render();

        }

        return $this->renderOutput();
    }
}
