<?php

namespace App\Http\Controllers;

use App\AssistanceType;
use App\CarerReference;
use App\CarersProfile;
use App\Language;
use App\Postcode;
use App\User;
use App\WorkingTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class CarerController extends FrontController
{

    public function __construct()
    {
        parent::__construct();

    }

    public function welcome()
    {
        $this->template = config('settings.frontTheme') . '.templates.ImCarer';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        $this->content = view(config('settings.frontTheme') . '.ImCarer.ImCarer')->render();
        return $this->renderOutput();
    }

    public function index()
    {

        $this->template = config('settings.frontTheme') . '.templates.carerPrivateProfile';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        if (!$this->user) {
            $this->content = view(config('settings.frontTheme') . '.ImCarer.ImCarer')->render();
        } else {

            $carerProfile = CarersProfile::findOrFail($this->user->id);

            if ($carerProfile->registration_progress != '20') {
                return redirect()->action('CarerRegistrationController@index');
            }
            $this->vars = array_add($this->vars, 'user', $this->user);
            $this->vars = array_add($this->vars, 'carerProfile', $carerProfile);
            $postcodes = Postcode::all()->pluck('name', 'id')->toArray();
            $this->vars = array_add($this->vars, 'postcodes', $postcodes);
            $typeCare = AssistanceType::all();
            $this->vars = array_add($this->vars, 'typeCare', $typeCare);
            $workingTimes = WorkingTime::all();
            $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
            $languages = Language::all();
            $this->vars = array_add($this->vars, 'languages', $languages);
            //dd($this->user,$carerProfile);
            $this->content = view(config('settings.frontTheme') . '.CarerProfiles.PrivateProfile')->with($this->vars)->render();

        }

        //$step = view(config('settings.frontTheme').'.carerRegistration.'.$this->carersProfile->getNextStep())->with($this->vars)->render();
        //$this->vars = array_add($this->vars,'step',$step);

//        $this->content = view(config('settings.frontTheme').'.homePage.homePage')->with($this->vars)->render();

        //dd($this->content);

        return $this->renderOutput();
    }

    public function profile()
    {

        $this->template = config('settings.frontTheme') . '.templates.carerPrivateProfile';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        if (!$this->user) {
            $this->content = view(config('settings.frontTheme') . '.ImCarer.ImCarer')->render();
        } else {

            $carerProfile = CarersProfile::findOrFail($this->user->id);

            if ($carerProfile->registration_progress != '20') {
                return redirect()->action('CarerRegistrationController@index');
            }
            $this->vars = array_add($this->vars, 'user', $this->user);
            $this->vars = array_add($this->vars, 'carerProfile', $carerProfile);
            $postcodes = Postcode::all()->pluck('name', 'id')->toArray();
            $this->vars = array_add($this->vars, 'postcodes', $postcodes);
            $typeCare = AssistanceType::all();
            $this->vars = array_add($this->vars, 'typeCare', $typeCare);
            $workingTimes = WorkingTime::all();
            $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
            $languages = Language::all();
            $this->vars = array_add($this->vars, 'languages', $languages);
            //dd($this->user,$carerProfile);
            $this->content = view(config('settings.frontTheme') . '.CarerProfiles.PublicProfile')->with($this->vars)
                ->render();

        }

        //$step = view(config('settings.frontTheme').'.carerRegistration.'.$this->carersProfile->getNextStep())->with($this->vars)->render();
        //$this->vars = array_add($this->vars,'step',$step);

//        $this->content = view(config('settings.frontTheme').'.homePage.homePage')->with($this->vars)->render();

        //dd($this->content);

        return $this->renderOutput();
    }
    public function update(Request $request)
    {


        $depart = '';
        //dd($request->all());

        $input = $request->all();

        $carerProfiles = CarersProfile::findOrFail($input['id']);

        if ($input['stage'] == 'general') {

            $depart = "#carerGeneral";

            if (isset($input['address_line1'])) $carerProfiles->address_line1 = $input['address_line1'];
            if (isset($input['address_line2'])) $carerProfiles->address_line2 = $input['address_line2'];
            if (isset($input['town'])) $carerProfiles->town = $input['town'];
            if (isset($input['postcode_id'])) $carerProfiles->postcode_id = $input['postcode_id'];
            if (isset($input['postcode'])) $carerProfiles->postcode = $input['postcode'];
            if (isset($input['mobile_number'])) $carerProfiles->mobile_number = $input['mobile_number'];
            if (isset($input['sentence_yourself'])) $carerProfiles->sentence_yourself = $input['sentence_yourself'];
            if (isset($input['description_yourself'])) $carerProfiles->description_yourself = $input['description_yourself'];
            if (isset($input['national_insurance_number'])) $carerProfiles->national_insurance_number = $input['national_insurance_number'];

            $carerProfiles->save();

            if (isset($input['Persons']) && count($input['Persons'])) {
                foreach ($input['Persons'] as $personData) {

                    $person = CarerReference::findOrFail($personData['id']);

                    if (isset($personData['name'])) $person->name = $personData['name'];
                    if (isset($personData['job_title'])) $person->job_title = $personData['job_title'];
                    if (isset($personData['relationship'])) $person->relationship = $personData['relationship'];
                    if (isset($personData['phone'])) $person->phone = $personData['phone'];
                    if (isset($personData['email'])) $person->email = $personData['email'];

                    $person->save();

                    unset($person);
                }
            }
            unset($carerProfiles);
        }
        if ($input['stage'] == 'bank') {

            $this->validate($request,[
                'account_number' => 'nullable|integer',
            ]);

            $depart = "#carerBank";

            //$user = User::findOrFail($input['id']);
            $carerProfiles = CarersProfile::findOrFail($input['id']);
            if (isset($input['sort_code'])) $carerProfiles->sort_code = $input['sort_code'];
            if (isset($input['account_number'])) $carerProfiles->account_number = $input['account_number'];

            $carerProfiles->save();
       /*     $user->save();
            unset($user);*/
            unset($carerProfiles);
        }

        if ($input['stage'] == 'carerPrivateTypeCare') {

            $depart = "#carerTypeCare";

            if (isset($input['typeCare']))
                $carerProfiles->AssistantsTypes()->sync(array_keys($input['typeCare']));

            unset($carerProfiles);
        }

        if ($input['stage'] == 'carerPrivateAvailability') {

            $depart = "#carerAvailability";

            if (isset($input['work_hours'])) $carerProfiles->work_hours = $input['work_hours'];
            if (isset($input['work_at_holiday'])) $carerProfiles->work_at_holiday = $input['work_at_holiday'];

            $carerProfiles->save();

            if (isset($input['workingTime']))
                $carerProfiles->WorkingTimes()->sync(array_keys($input['workingTime']));

            unset($carerProfiles);
        }

        if ($input['stage'] == 'carerPrivatePets') {

            $depart = "#carerPets";

            if (isset($input['work_with_pets'])) $carerProfiles->work_with_pets = $input['work_with_pets'];
            if (isset($input['pets_description'])) $carerProfiles->pets_description = $input['pets_description'];

            $carerProfiles->save();

            unset($carerProfiles);
        }

        if ($input['stage'] == 'carerPrivateLanguages') {

            $depart = "#carerLanguages";

            if (isset($input['languages']))
                $carerProfiles->Languages()->sync(array_keys($input['languages']));
                if (isset($input['language_additional'])) $carerProfiles->language_additional = $input['language_additional'];
                $carerProfiles->save();

            unset($carerProfiles);
        }

        if ($input['stage'] == 'carerPrivateTransport') {

            $depart = "#carerTransport";

            if (isset($input['driving_licence'])) $carerProfiles->driving_licence = $input['driving_licence'];
            if (isset($input['have_car'])) $carerProfiles->have_car = $input['have_car'];
            if (isset($input['use_car'])) $carerProfiles->use_car = $input['use_car'];
            if (isset($input['car_insurance_number'])) $carerProfiles->car_insurance_number = $input['car_insurance_number'];
            if (isset($input['DBS_number'])) $carerProfiles->DBS_number = $input['DBS_number'];


            if (isset($input['driver_licence_valid_until'])) $carerProfiles->driver_licence_valid_until = $input['driver_licence_valid_until'];
            if (isset($input['car_insurance_valid_until'])) $carerProfiles->car_insurance_valid_until = $input['car_insurance_valid_until'];

            $carerProfiles->save();
            unset($carerProfiles);
        }

        if ($input['stage'] == 'carerPrivateCriminal') {

            $depart = "#carerCriminal";

            if (isset($input['DBS'])) $carerProfiles->DBS = $input['DBS'];
            if (isset($input['criminal_conviction'])) $carerProfiles->criminal_conviction = $input['criminal_conviction'];
            if (isset($input['DBS_use'])) $carerProfiles->DBS_use = $input['DBS_use'];
            if (isset($input['DBS_identifier'])) $carerProfiles->DBS_identifier = $input['DBS_identifier'];
            if (isset($input['date_certificate'])) $carerProfiles->date_certificate = $input['date_certificate'];

            $carerProfiles->save();
            unset($carerProfiles);
        }

        //return redirect()->back();


        return response(json_encode(['status'=>'save']),200);

    }
}
