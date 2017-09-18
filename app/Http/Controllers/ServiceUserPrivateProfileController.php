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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

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

    public function update(Request $request, $serviceUserProfileID)
    {
        $input = $request->all();
        $serviceUsersProfile = ServiceUsersProfile::findOrFail($serviceUserProfileID);


        $depart = '#';

        if ($input['stage'] == 'general') {

            $this->validate($request, [

                'like_name' =>
                    array(
                        'required',
                        'string',
                        'max:128'
                    ),
                'mobile_number' =>
                    array(
                        'required',
                    ),
                'address_line1' =>
                    array(
                        'required',
                        'string',
                        'max:256'
                    ),
                'address_line2' =>
                    array(
                        'nullable',
                        'string',
                        'max:256'
                    ),
                'town' =>
                    array(
                        'required',
                        'string',
                        'max:128'
                    ),
                'postcode' =>
                    array(
                        'required',
                        'regex:/^([Bb][Ll][0-9])|([Mm][0-9]{1,2})|([Oo][Ll][0-9]{1,2})|([Ss][Kk][0-9]{1,2})|([Ww][AaNn][0-9]{1,2})|([Ss][Kk][0-9]{1,2}) [0-9][A-Za-z]{1,2}$/'
                    )
            ]);

            $depart = "#servicePrivateGeneral";

            if (isset($input['like_name'])) $serviceUsersProfile->like_name = $input['like_name'];
            if (isset($input['address_line1'])) $serviceUsersProfile->address_line1 = $input['address_line1'];
            if (isset($input['address_line2'])) $serviceUsersProfile->address_line2 = $input['address_line2'];
            if (isset($input['town'])) $serviceUsersProfile->town = $input['town'];
            if (isset($input['postcode'])) $serviceUsersProfile->postcode = $input['postcode'];
            if (isset($input['mobile_number'])) $serviceUsersProfile->mobile_number = $input['mobile_number'];

            $serviceUsersProfile->save();
            unset($serviceUsersProfile);
        }

        return Redirect::to(URL::previous() . $depart);
    }
}
