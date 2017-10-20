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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

class CarerRegistrationController extends FrontController
{

    private $carersProfile;

    public function __construct(CarerRegistration $carersProfile)
    {
        parent::__construct();
        $this->carersProfile = $carersProfile;

        $this->template = config('settings.frontTheme') . '.templates.userRegistration';
    }

    public function index($stepback = null)
    {

        if (request()->has('ref')){
            if(request()->get('ref')=='REGISTER'){
                $this->vars = array_add($this->vars, 'use_register_code', 1);
                $this->vars = array_add($this->vars, 'ref_code', request()->get('ref'));
            }
            else {
                $ref_code = $this->checkReferCode(request()->get('ref'));

                if ($ref_code != 0) {
                    $this->vars = array_add($this->vars, 'ref_code', $ref_code);
                }
            }
        }


        $this->title = 'Carer Registration';

        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);

        $user = Auth::user();

        //dd('CarerRegistrationController index' , $user);


        if (!$user) {
            $step = view(config('settings.frontTheme') . '.carerRegistration.Step1_carerRegistration')->with($this->vars)->render();
            $this->vars = array_add($this->vars, 'activeStep', 1);
        } else {

            //dd($this->user, $this->carersProfile->getID(),$this->carersProfile->getNextStep());
            $carersProfile = CarersProfile::find($user->id);

            if (!$carersProfile) {
                return redirect('/');
            }


            //dd($carersProfile->registration_progress);

            if ($carersProfile->registration_status != 'new') {
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

            $this->vars = array_add($this->vars, 'activeStep', $this->carersProfile->getActiveStep($user->id));

            $step = view(config('settings.frontTheme') . '.carerRegistration.' . $this->carersProfile->getNextStep($stepback))->with($this->vars)->render();
        }
        //dd($assistanceTypes);

        $this->vars = array_add($this->vars, 'step', $step);

        $this->content = view(config('settings.frontTheme') . '.carerRegistration.carerRegistration')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function update(Request $request)
    {

        if ($request->has('stepback')) {

            $stepback = $request->stepback;

            $carerProfiles = CarersProfile::findOrFail($request->input('carersProfileID'));

            if ($stepback == '4' && $carerProfiles->criminal_conviction == 'Some' && $carerProfiles->registration_progress != '5')
                $stepback = '5';

            $carerProfiles->registration_progress = $stepback;

            $carerProfiles->save();

        } else {

            $this->carersProfile->saveStep($request);
        }


        return redirect('/carer-registration');

    }

    public function sendContinueRegistration()
    {

        $user = Auth::user();

        if(!$user) {
            return redirect('/');
        }

        $this->title = 'Carer Registration';

        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);


        $this->vars = array_add($this->vars, 'signUpUntil', $user->created_at->addWeek()->format('d/m/Y h:i A'));

        $carerProfile = CarersProfile::findOrFail($user->id);

        $text = view(config('settings.frontTheme') . '.emails.continue_sign_up_carer')->with([
            'user' => $user,
            'regTime' => $user->created_at->addWeek()->format('d/m/Y h:i A'),
            'like_name' => $carerProfile->like_name,
        ])->render();

        DB::table('mails')
            ->insert(
                [
                    'email' =>$user->email,
                    'subject' =>'Registration on HOLM',
                    'text' =>$text,
                    'time_to_send' => Carbon::now(),
                    'status'=>'new'
                ]);

        $this->content = view(config('settings.frontTheme') . '.carerRegistration.thankYou')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function sendCompleteRegistration()
    {

        $user = Auth::user();

        if(!$user) {
            return redirect('/');
        }

        $carerProfile = CarersProfile::findOrFail($user->id);

        $carerProfile->registration_status = 'completed';

        $text = view(config('settings.frontTheme') . '.emails.complete_sign_up_carer')->with([
            'user' => $user,
            'like_name'=>$carerProfile->like_name
        ])->render();

        DB::table('mails')
            ->insert(
                [
                    'email' =>$user->email,
                    'subject' =>'Welcome on HOLM',
                    'text' =>$text,
                    'time_to_send' => Carbon::now(),
                    'status'=>'new'
                ]);


        $text = view(config('settings.frontTheme') . '.emails.promo_letter_for_referral_bonuses')->with([
            'user' => $user,
        ])->render();

        DB::table('mails')
            ->insert(
                [
                    'email' =>$user->email,
                    'subject' =>'How would you like an extra £100?',
                    'text' =>$text,
                    'time_to_send' => Carbon::now()->addHour(1),
                    'status'=>'new'
                ]);

        $carerProfile->update();

        return redirect('/carer-settings');
    }
}
