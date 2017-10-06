<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Repo\PurchaserRegistration;
use App\Postcode;
use App\PurchasersProfile;
use App\ServiceUsersProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

class PurchaserRegistrationController extends FrontController
{
    private $purchaserProfile;

    public function __construct(PurchaserRegistration $purchaserProfile) {
        parent::__construct();
        $this->purchaserProfile = $purchaserProfile;

        $this->template = config('settings.frontTheme').'.templates.userRegistration';
    }

    public function index()
    {

        $this->title = 'Purchaser Registration';

        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);

        $user = Auth::user();

        if (!$user) {
            $step = view(config('settings.frontTheme').'.purchaserRegistration.Step1_purchaserRegistration')->with($this->vars)->render();
            $this->vars = array_add($this->vars,'activeStep',1);
            $this->vars = array_add($this->vars,'activeSubStep',0);
        } else {
            $purchasersProfile = PurchasersProfile::findOrFail($user->id);

            //dd($this->purchaserProfile->getNextStep());


            $this->vars = array_add($this->vars, 'purchasersProfileID', $purchasersProfile->id);
            $this->vars = array_add($this->vars, 'purchasersProfile', $purchasersProfile);

            if ($this->purchaserProfile->getNextStep() == 'Step4_purchaserRegistration') {
                //$postcodes = Postcode::all()->pluck('name', 'id')->toArray();
                //$this->vars = array_add($this->vars, 'postcodes', $postcodes);
                $this->vars = array_add($this->vars, 'user', $this->user);
            }
            if ($this->purchaserProfile->getNextStep() == 'Step4_1_purchaserRegistration') {

                //dd('gtehth');

                if (!count($purchasersProfile->serviceUsers)) {
                    $serviceUsersProfile = new ServiceUsersProfile();
                    $serviceUsersProfile->purchaser_id = $purchasersProfile->id;
                    $serviceUsersProfile->save();
                } else {
                    $serviceUsersProfile = $purchasersProfile->serviceUsers->first();
                }
                    $this->vars = array_add($this->vars, 'user', $this->user);
                    $this->vars = array_add($this->vars, 'serviceUserProfile', $serviceUsersProfile);

            }
            if ($this->purchaserProfile->getNextStep() == 'Step4_2_purchaserRegistration') {


                if (count($purchasersProfile->serviceUsers)){

                    $serviceUsersProfile = $purchasersProfile->serviceUsers->first();
                }
                else {
                    $serviceUsersProfile = new ServiceUsersProfile();
                    $serviceUsersProfile->purchaser_id = $purchasersProfile->id;
                    if ($purchasersProfile->purchasing_care_for == 'Myself') {
                        $serviceUsersProfile->title = $purchasersProfile->title;
                        $serviceUsersProfile->first_name = $purchasersProfile->first_name;
                        $serviceUsersProfile->family_name = $purchasersProfile->family_name;
                        $serviceUsersProfile->like_name = $purchasersProfile->like_name;
                        $serviceUsersProfile->gender = $purchasersProfile->gender;
                        $serviceUsersProfile->mobile_number = $purchasersProfile->mobile_number;
                        $serviceUsersProfile->address_line1 = $purchasersProfile->address_line1;
                        $serviceUsersProfile->address_line2 = $purchasersProfile->address_line2;
                        $serviceUsersProfile->address_line1 = $purchasersProfile->address_line1;
                        $serviceUsersProfile->town = $purchasersProfile->town;
                        $serviceUsersProfile->postcode = $purchasersProfile->postcode;
                        $serviceUsersProfile->DoB = $purchasersProfile->DoB;
                    }
                    $serviceUsersProfile->save();

                }

                //dd($serviceUsersProfile);

                //$postcodes = Postcode::all()->pluck('name', 'id')->toArray();
                $this->vars = array_add($this->vars, 'user', $this->user);
                $this->vars = array_add($this->vars, 'serviceUsersProfile', $serviceUsersProfile);
            }

            $this->vars = array_add($this->vars,'activeStep',$this->purchaserProfile->getActiveStep($user->id));
            $this->vars = array_add($this->vars,'activeSubStep',$this->purchaserProfile->getActiveSubStep($user->id));

            $step = view(config('settings.frontTheme').'.purchaserRegistration.'.$this->purchaserProfile->getNextStep())->with($this->vars)->render();

        }


        $this->vars = array_add($this->vars,'step',$step);

        $this->content = view(config('settings.frontTheme') . '.purchaserRegistration.purchaserRegistration')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function update(Request $request) {

        if ($request->has('stepback')) {
            //dd($request->all());

            $stepback = $request->stepback;
            $purchaserProfiles = PurchasersProfile::findOrFail($request->input('purchasersProfileID'));

            if ($stepback=='4_1' && $purchaserProfiles->purchasing_care_for == 'Myself'){

                $purchaserProfiles->registration_progress = '4_2';

            } else {
                $purchaserProfiles->registration_progress = $request->input('stepback');
            }

            $purchaserProfiles->save();

        } else {

            $this->purchaserProfile->saveStep($request);
        }


        return redirect('/purchaser-registration');

    }

    public function sendContinueRegistration()
    {

        $user = Auth::user();

        if(!$user) {
            return redirect('/');
        }

        $this->title = 'Purchaser Registration';

        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);


        $this->vars = array_add($this->vars, 'signUpUntil', $user->created_at->addWeek()->format('d/m/Y h:i A'));


        try {
            Mail::send(config('settings.frontTheme') . '.emails.continue_sign_up_service_user',
                ['user' => $user],
                function ($m) use ($user) {
                    $m->to($user->email)->subject('Registration on HOLM');
                });
        } catch (Swift_TransportException $STe) {

            $error = MailError::create([
                'error_message' => $STe->getMessage(),
                'function' => __METHOD__,
                'action' => 'Try to sent continue_sign_up_purchaser',
                'user_id' => $user->id
            ]);
        }
/*
        try {

            Mail::send(config('settings.frontTheme') . '.emails.continue_sign_up_service_user',
                ['user' => $user, 'password' => $request['password']],
                function ($m) use ($request) {
                    $m->to($request['email'])->subject('Registration on HOLM');
                });
        }
        catch (Swift_TransportException $STe){

            $error = MailError::create([
                'error_message'=>$STe->getMessage(),
                'function'=>__METHOD__,
                'action'=>'Try to sent continue_sign_up_service_user',
                'user_id'=>$user->id
            ]);
        }*/




        $this->content = view(config('settings.frontTheme') . '.carerRegistration.thankYou')->with($this->vars)->render();

        return $this->renderOutput();
    }

/*    public function sendCompleteRegistration()
    {

        $user = Auth::user();

        if(!$user) {
            return redirect('/');
        }

        try {
            Mail::send(config('settings.frontTheme') . '.emails.complete_sign_up_carer',
                ['user' => $user],
                function ($m) use ($user) {
                    $m->to($user->email)->subject('Welcome on HOLM');
                });
        } catch (Swift_TransportException $STe) {

            $error = MailError::create([
                'error_message' => $STe->getMessage(),
                'function' => __METHOD__,
                'action' => 'Try to sent complete_sign_up_carer',
                'user_id' => $user->id
            ]);
        }


        return redirect('/carer-settings');
    }*/
}
