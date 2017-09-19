<?php

namespace App\Http\Controllers;

use App\AssistanceType;
use App\Behaviour;
use App\Floor;
use App\Language;
use App\ServiceType;
use App\ServiceUserCondition;
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
            return redirect('/');
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

            $serviceUserConditions = ServiceUserCondition::all();
            $this->vars = array_add($this->vars, 'serviceUserConditions', $serviceUserConditions);

            $floors = Floor::all()->pluck('name', 'id')->toArray();
            $this->vars = array_add($this->vars, 'floors', $floors);
            $this->content = view(config('settings.frontTheme') . '.serviceUserProfiles.PrivateProfile')->with($this->vars)->render();

        }

        return $this->renderOutput();
    }

    public function profile($serviceUserProfile)
    {


        //dd($serviceUserProfile);

        $this->template = config('settings.frontTheme') . '.templates.serviceUserPrivateProfileTemplate';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);

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

        if ($input['stage'] == 'oneLineAbove') {
            $this->validate($request,[
                'one_line_about' => 'nullable|string|max:250',
            ]);

            $depart = "#servicePrivateGeneral";

            if (isset($input['one_line_about'])) $serviceUsersProfile->one_line_about = $input['one_line_about'];

            $serviceUsersProfile->save();
            unset($serviceUsersProfile);
        }

        if ($input['stage'] == 'languages') {
            $this->validate($request,[
                'languages' => 'required|array',
                'other_languages' => 'nullable|string|max:200',
            ]);

            $depart = "#servicePrivateGeneral";

            $languages = $request->input('languages');
            $serviceUsersProfile->Languages()->sync(array_keys($languages));
            $serviceUsersProfile->other_languages  = $request->input('other_languages');

            $serviceUsersProfile->save();
            unset($serviceUsersProfile);
        }


        if ($input['stage'] == 'home') {
            $this->validate($request,[
                'kind_of_building' => 'required|string|max:25',
                'lift_available' => 'nullable|in:"Yes","No"',
                'floor_id' => 'nullable|integer',
                'home_safe' => 'required|in:"Yes","No","Sometimes"',
                'assistance_keeping' => 'nullable|in:"Yes","No","Sometimes"',
                'move_available' => 'required|in:"Yes","No","Sometimes"',
                'assistance_moving' => 'nullable|in:"Yes","No","Sometimes"',
                'assistance_moving_details' => 'nullable|string|max:250',
                'carer_enter' => 'nullable|string|max:500',
                'other_detail' => 'nullable|string|max:500',
                'anyone_else_live' => 'nullable|in:"Yes","No","Sometimes"',
                'anyone_detail' => 'nullable|string|max:250',
                'anyone_friendly' => 'nullable|in:"Yes","No","Sometimes","Normally"',
                'own_pets' => 'nullable|in:"Yes","No","Sometimes"',
                'pet_detail' => 'nullable:own_pets,"Yes","Sometimes"|string|max:250|nullable',
                'pet_friendly' => 'nullable:own_pets,"Yes","Sometimes"|in:"Yes","No","Sometimes","Normally"|nullable',
                'social_interaction' => 'nullable|in:"Yes","No","Sometimes"',
                'visit_for_companionship' => 'nullable|in:"Yes","No","Sometimes"',
                'companionship_interaction_details' => 'nullable|string|max:250',
                'companionship_visit_details' => 'nullable|string|max:250',
            ]);

            $depart = "#home";

            if (isset($input['kind_of_building'])) $serviceUsersProfile->kind_of_building = $input['kind_of_building'];
            if (isset($input['lift_available'])) $serviceUsersProfile->lift_available = $input['lift_available'];
            if (isset($input['floor_id'])) $serviceUsersProfile->floor_id = $input['floor_id'];
            if (isset($input['home_safe'])) $serviceUsersProfile->home_safe = $input['home_safe'];
            if (isset($input['assistance_keeping'])) $serviceUsersProfile->assistance_keeping = $input['assistance_keeping'];
            if (isset($input['move_available'])) $serviceUsersProfile->move_available = $input['move_available'];
            if (isset($input['assistance_moving'])) $serviceUsersProfile->assistance_moving = $input['assistance_moving'];
            if (isset($input['assistance_moving_details'])) $serviceUsersProfile->mobile_number = $input['assistance_moving_details'];
            if (isset($input['carer_enter'])) $serviceUsersProfile->carer_enter = $input['carer_enter'];
            if (isset($input['other_detail'])) $serviceUsersProfile->other_detail = $input['other_detail'];
            if (isset($input['anyone_else_live'])) $serviceUsersProfile->anyone_else_live = $input['anyone_else_live'];
            if (isset($input['anyone_detail'])) $serviceUsersProfile->anyone_detail = $input['anyone_detail'];
            if (isset($input['anyone_friendly'])) $serviceUsersProfile->anyone_friendly = $input['anyone_friendly'];
            if (isset($input['own_pets'])) $serviceUsersProfile->own_pets = $input['own_pets'];
            if (isset($input['pet_detail'])) $serviceUsersProfile->pet_detail = $input['pet_detail'];
            if (isset($input['pet_friendly'])) $serviceUsersProfile->pet_friendly = $input['pet_friendly'];
            if (isset($input['social_interaction'])) $serviceUsersProfile->social_interaction = $input['social_interaction'];
            if (isset($input['visit_for_companionship'])) $serviceUsersProfile->visit_for_companionship = $input['visit_for_companionship'];
            if (isset($input['companionship_interaction_details'])) $serviceUsersProfile->companionship_interaction_details = $input['companionship_interaction_details'];
            if (isset($input['companionship_visit_details'])) $serviceUsersProfile->companionship_visit_details = $input['companionship_visit_details'];

            $serviceUsersProfile->save();
            unset($serviceUsersProfile);


        }



        if ($input['stage'] == 'nightTime') {
            $this->validate($request,[
                'religious_beliefs' => 'nullable|in:"Yes","No","Sometimes"',
                'religious_beliefs_details' => 'nullable|string|max:250',
                'particular_likes' => 'nullable|string|max:16',
                'keeping_safe_at_night' => 'nullable|in:"Yes","No","Sometimes"',
                'keeping_safe_at_night_details' => 'nullable|string|max:250',
                'time_to_night_helping' => 'nullable|string|max:16',
                'toilet_at_night' => 'nullable|in:"Yes","No","Sometimes"',
                'toiled_help_details' => 'nullable|string|max:250',
            ]);

            $depart = "#nightTime";

            if (isset($input['religious_beliefs'])) $serviceUsersProfile->religious_beliefs = $input['religious_beliefs'];
            if (isset($input['religious_beliefs_details'])) $serviceUsersProfile->religious_beliefs_details = $input['religious_beliefs_details'];
            if (isset($input['particular_likes'])) $serviceUsersProfile->particular_likes = $input['particular_likes'];
            if (isset($input['keeping_safe_at_night'])) $serviceUsersProfile->keeping_safe_at_night = $input['keeping_safe_at_night'];
            if (isset($input['keeping_safe_at_night_details'])) $serviceUsersProfile->keeping_safe_at_night_details = $input['keeping_safe_at_night_details'];
            if (isset($input['time_to_night_helping'])) $serviceUsersProfile->time_to_night_helping = $input['time_to_night_helping'];
            if (isset($input['toilet_at_night'])) $serviceUsersProfile->toilet_at_night = $input['toilet_at_night'];
            if (isset($input['toiled_help_details'])) $serviceUsersProfile->toiled_help_details = $input['toiled_help_details'];

            $serviceUsersProfile->save();
            unset($serviceUsersProfile);

        }



        if ($input['stage'] == 'other') {
            $this->validate($request,[
                'religious_beliefs' => 'nullable|in:"Yes","No","Sometimes"',
                'religious_beliefs_details' => 'nullable|string|max:500',
                'particular_likes' => 'nullable|in:"Yes","No","Sometimes"',
                'particular_likes_details' => 'nullable|string|max:500',
                'multiple_carers' => 'nullable|in:"Yes","No","Sometimes"',
                'multiple_carers_details' => 'nullable|string|max:500',
                'socialising_with_other' => 'nullable|in:"Yes","No","Sometimes"',
                'socialising_with_other_details' => 'nullable|string|max:500',
                'interests_hobbies' => 'nullable|in:"Yes","No","Sometimes"',
                'interests_hobbies_details' => 'nullable|string|max:500',
                'we_missed' => 'nullable|in:"Yes","No","Sometimes"',
                'we_missed_details' => 'nullable|string|max:500',
            ]);

            $depart = "#nightTime";

            if (isset($input['religious_beliefs'])) $serviceUsersProfile->          religious_beliefs = $input['religious_beliefs'];
            if (isset($input['religious_beliefs_details'])) $serviceUsersProfile->  religious_beliefs_details = $input['religious_beliefs_details'];
            if (isset($input['particular_likes'])) $serviceUsersProfile->           particular_likes = $input['particular_likes'];
            if (isset($input['particular_likes_details'])) $serviceUsersProfile->   particular_likes_details = $input['particular_likes_details'];
            if (isset($input['multiple_carers'])) $serviceUsersProfile->            multiple_carers = $input['multiple_carers'];
            if (isset($input['multiple_carers_details'])) $serviceUsersProfile->    multiple_carers_details = $input['multiple_carers_details'];
            if (isset($input['socialising_with_other'])) $serviceUsersProfile->     socialising_with_other = $input['socialising_with_other'];
            if (isset($input['socialising_with_other_details'])) $serviceUsersProfile->socialising_with_other_details = $input['socialising_with_other_details'];
            if (isset($input['interests_hobbies'])) $serviceUsersProfile->          interests_hobbies = $input['interests_hobbies'];
            if (isset($input['interests_hobbies_details'])) $serviceUsersProfile->  interests_hobbies_details = $input['interests_hobbies_details'];
            if (isset($input['we_missed'])) $serviceUsersProfile->                  we_missed = $input['we_missed'];
            if (isset($input['we_missed_details'])) $serviceUsersProfile->          we_missed_details = $input['we_missed_details'];

            $serviceUsersProfile->save();
            unset($serviceUsersProfile);

        }
        if ($input['stage'] == 'behaviour') {
            $this->validate($request,[
                'behaviour' => 'required|array',
                'other_behaviour' => 'nullable|string|max:200',
                'consent_details' => 'nullable|string|max:500',
            ]);

            $depart = "#behaviour";

            $behaviour = $request->input('behaviour');
            $serviceUsersProfile->Behaviours()->sync(array_keys($behaviour));
            $serviceUsersProfile->other_behaviour  = $request->input('other_behaviour');
            $serviceUsersProfile->consent_details  = $request->input('consent_details');

            $serviceUsersProfile->save();
            unset($serviceUsersProfile);
        }

        if ($input['stage'] == 'typeOfCare') {




            $this->validate($request,[
                'typeService' => 'required|array',
                'checkSrvCare' => 'required|array',
            ]);

            $depart = "#typeOfCare";

            $typeService = $request->input('typeService');
            $checkSrvCare = $request->input('checkSrvCare');
            //dd(array_keys($typeService),array_keys($checkSrvCare));

            $serviceUsersProfile->ServicesTypes()->sync(array_keys($typeService));
            $serviceUsersProfile->AssistantsTypes()->sync(array_keys($checkSrvCare));


            unset($serviceUsersProfile);
        }



dd($input);

        return Redirect::to(URL::previous() . $depart);

    }
}
