<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Repo\PurchaserRegistration;
use App\Postcode;
use App\PurchasersProfile;
use App\ServiceUsersProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            $this->vars = array_add($this->vars, 'purchasersProfileID', $purchasersProfile->id);
            $this->vars = array_add($this->vars, 'purchasersProfile', $purchasersProfile);

            if ($this->purchaserProfile->getNextStep() == 'Step4_purchaserRegistration') {
                //$postcodes = Postcode::all()->pluck('name', 'id')->toArray();
                //$this->vars = array_add($this->vars, 'postcodes', $postcodes);
                $this->vars = array_add($this->vars, 'user', $this->user);
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

            $purchaserProfiles->registration_progress = $request->input('stepback');

            $purchaserProfiles->save();

        } else {

            $this->purchaserProfile->saveStep($request);
        }


        return redirect('/purchaser-registration');

    }
}
